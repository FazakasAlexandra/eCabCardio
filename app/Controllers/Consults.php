<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ConsultsModel;
use App\Models\ConsultsAnalysisModel;
use App\Models\ConsultsExaminationsModel;
use App\Models\MedicalLetterModel;
use App\Models\ExaminationsModel;
use App\Models\AnalysisModel;
use App\Models\PatientsModel;
use App\Models\ConsultFilesModel;
use App\Models\HistoryModel;
use App\Models\ReceiptsModel;

class Consults extends BaseController
{
	use ResponseTrait;

	public function __construct()
	{
		parent::__construct();
		$this->consultsModel = new ConsultsModel();
		$this->consultFilesModel = new ConsultFilesModel();
		$this->consultsAnalysisModel = new ConsultsAnalysisModel();
		$this->examModel = new ExaminationsModel();
		$this->analysisModel = new AnalysisModel();
		$this->patientModel = new PatientsModel();
		$this->consultsExaminationsModel = new ConsultsExaminationsModel();
		$this->medicalLetterModel = new MedicalLetterModel();
		$this->historyModel = new HistoryModel();
	}

	// RENDERS CONSULT PAGE & HANDLES POST CONSULT REQUEST
	public function index($patientId)
	{
		echo view('templates/header.php', $this->logo);

		helper(['form', 'url']);
		
		$data = [
			'examinations' => $this->examModel->getExaminations(),
			'analysis' => $this->analysisModel->getAnalysis(),
			'patient' => $this->patientModel->getSingle($patientId),
			'doctor_id' => 5,
		];

		$request = $this->request->getPost();

		if ($request) {
			if ($this->validateConsult($data)) {
				$request['patient_id'] = $patientId;
				$request['doctor_id'] = 5; // HARDCODED USER_ID !!
				$request['date'] = date("Y-m-d");

				$consultId = $this->consultsModel->insertConsult($request);
				$data['consult_id'] = $consultId;

				$this->storeConsultFiles($consultId);

				$this->consultsAnalysisModel->insertConsultAnalysis($consultId, $request['analysis']);
				$this->consultsExaminationsModel->insertConsultExamination($consultId, $request['examinations']);
			}
		}

		
		echo view('pages/consult.php', [
			'data' => $data
		]);
	}

	public function storeConsultFiles($consultId)
	{
		if ($this->request->getFiles()) {

			foreach ($this->request->getFiles()['files'] as $file) {
				// mime type check
				if(!$file->getName()) return;
				
				$fileName = $file->getRandomName();
				$file->move('assets', $fileName);
				$this->consultFilesModel->insertConsultFiles(['consult_id' => $consultId, 'file_name' => $fileName]);
			}
		}
	}

	public function getConsultFiles($consultId)
	{
		$consultImgs = $this->consultFilesModel->getConsultFiles($consultId);

		return $this->respond([
			'status' => 201,
			'error' => null,
			'consult_images' => $consultImgs
		]);
	}

	public function validateConsult(&$data)
	{
		$validation =  \Config\Services::validation();

		$validation->setRules([
			'recommendations' => ['rules' => 'required'],
			'treatment' => ['rules' => 'required'],
			'diagnostic' => ['rules' => 'required'],
			'examinations' => ['rules'=>'required'],
			'analysis' => ['rules'=>'required']
		]);

		if (!$validation->withRequest($this->request)->run()) {
			$data['errors'] = $validation->getErrors();
			return false;
		} else {
			$data['success'] = 'Consult successfully saved!';
			return true;
		}
	}

	public function getSingleConsult($consultId)
	{
		$consult = $this->consultsModel->getConsult($consultId);
		
		$consult->examinations = $this->consultsExaminationsModel->getExaminations($consult->id);
		$consult->analysis = $this->consultsAnalysisModel->getAnalysis($consult->id);

		return $this->respond([
			'status' => 201,
			'error' => null,
			'consult' => $consult,
		]);
	}

	public function getMedicalLetter($consultId)
	{
		$medicalLetter = $this->medicalLetterModel->getMedicalLetter($consultId);
		$medicalLetter->examinations = $this->consultsExaminationsModel->getExaminations($consultId);
		$medicalLetter->analysis = $this->consultsAnalysisModel->getAnalysis($consultId);

		return $this->respond([
			'status' => 201,
			'error' => null,
			'medical_letter' => $medicalLetter,
		]);
	}

	public function history($consultId)
	{
		echo view('templates/header.php', $this->logo);
		
		$receiptsModel = new ReceiptsModel();
		$consulthistory = $this->historyModel->getConsultHistory($consultId);

		$consulthistory[0]['receipt'] = $receiptsModel->getConsultReceipt($consulthistory[0]['consult_id']); 

		echo view('pages/patients_history.php', [
			'patientHistory' => [
				'data' => $consulthistory,
				'name' => $consulthistory[0]['patient_name']
			]
		]);
	}
}
