<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ConsultsModel;
use App\Models\ConsultsAnalysisModel;
use App\Models\ConsultsExaminationsModel;
use App\Models\MedicalLetterModel;

class Consults extends BaseController
{

	use ResponseTrait;

	public function index($patientId)
	{
		echo view('templates/header.php');
		echo'<h3>consult patient with id ' . (string) $patientId. ' </h3>';
	}

	public function getSingleConsult($consultId)
	{
		$consultsModel = new ConsultsModel();
		$consultsExaminationsModel = new ConsultsExaminationsModel();
		$consultsAnalysisModel = new ConsultsAnalysisModel();

		$consult = $consultsModel->getConsult($consultId);
		
		$consult->examinations = $consultsExaminationsModel->getExaminations($consult->id);
		$consult->analysis = $consultsAnalysisModel->getAnalysis($consult->id);

		return $this->respond([
			'status' => 201,
			'error' => null,
			'consult' => $consult,
		]);
	}

	public function getMedicalLetter($consultId){
		$medicalLetterModel = new MedicalLetterModel();
		$consultsExaminationsModel = new ConsultsExaminationsModel();
		$consultsAnalysisModel = new ConsultsAnalysisModel();

		$medicalLetter = $medicalLetterModel->getMedicalLetter($consultId);
		$medicalLetter->examinations = $consultsExaminationsModel->getExaminations($consultId);
		$medicalLetter->analysis = $consultsAnalysisModel->getAnalysis($consultId);

		return $this->respond([
			'status' => 201,
			'error' => null,
			'medical_letter' => $medicalLetter,
		]);
	}

}
