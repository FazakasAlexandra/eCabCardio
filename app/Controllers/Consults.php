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
use App\Models\ConsultImagesModel;

class Consults extends BaseController
{
	use ResponseTrait;

	public function __construct()
	{
		$this->consultsModel = new ConsultsModel();
		$this->consultImgsModel = new ConsultImagesModel();
		$this->consultsAnalysisModel = new ConsultsAnalysisModel();
		$this->examModel = new ExaminationsModel();
		$this->analysisModel = new AnalysisModel();
		$this->patientModel = new PatientsModel();
		$this->consultsExaminationsModel = new ConsultsExaminationsModel();
		$this->medicalLetterModel = new MedicalLetterModel();
	}

	// RENDERS CONSULT PAGE & HANDLES POST CONSULT REQUEST
	public function index($patientId)
	{
		echo view('templates/header.php');

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
				$request['doctor_id'] = 5;
				$request['date'] = date("Y-m-d");

				$consultId = $this->consultsModel->insertConsult($request);
				$data['consult_id'] = $consultId;

				$this->storeConsultImages($consultId);

				$this->consultsAnalysisModel->insertConsultAnalysis($consultId, $request['analysis']);
				$this->consultsExaminationsModel->insertConsultExamination($consultId, $request['examinations']);
			}
		}

		echo view('pages/consult.php', [
			'data' => $data
		]);
	}

	public function storeConsultImages($consultId)
	{
		if ($this->request->getFiles()) {

			foreach ($this->request->getFiles()['images'] as $file) {
				// file type check
				$fileName = $file->getRandomName();
				$file->move('assets', $fileName);
				$this->consultImgsModel->insertConsultImages(['consult_id' => $consultId, 'file_name' => $fileName]);
			}
		}
	}

	public function getConsultImages($consultId)
	{
		$consultImgs = $this->consultImgsModel->getConsultImages($consultId);

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
}
