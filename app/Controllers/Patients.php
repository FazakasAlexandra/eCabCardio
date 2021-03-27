<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\HistoryModel;
use App\Models\ReceiptsModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\BuyersModel;

class Patients extends BaseController
{

	use ResponseTrait;

	public function __construct()
	{
		parent::__construct();
		$this->patientsModel = new PatientsModel();
		$this->historyModel = new HistoryModel();
	}
	

	public function index($offset = 0, $order = 'asc', $error = 0, $msg = null, $patient_id = null)
	{
		
		echo view('templates/header.php', $this->logo);

		$data = $this->patientsModel->getPatients((int) $offset, $order);
		$data['offset'] = $offset;
		$data['order'] = $order;

		if ($msg && !$error) {
			$data['msg'] = $msg;
			$data['patient_id'] = $patient_id;
		} else if ($msg && $error) {
			$data['error'] = $msg;
		}

		echo view('pages/patients.php', $data);
	}

	public function search()
	{
		echo view('templates/header.php', $this->logo);

		if ($this->request->getGet('search-criteria')) {
			$data['patients'] = $this->patientsModel->search([
				$this->request->getGet('search-criteria') => $this->request->getGet('search-value')
			]);
		} else {
			$data['patients'] = $this->patientsModel->search($this->request->getGet());
		}

		$data['records'] = count($data['patients']);
		$data['offset'] = 0;
		$data['order'] = 'asc';

		echo view('pages/patients.php', $data);
	}

	public function getPatient($patient_id)
	{
		return $this->respond([
			'status' => 201,
			'error' => null,
			'patient' => $this->patientsModel->getSingle($patient_id)
		]);
	}

	public function history($id)
	{
		$patientHistory = $this->historyModel->getPatientHistory($id);
		$receiptsModel = new ReceiptsModel();

		if (count($patientHistory) > 0) {
			foreach ($patientHistory as &$history) {
				$history['receipt'] = $receiptsModel->getConsultReceipt($history['consult_id']);
			}	
			echo view('templates/header.php', $this->logo);
			return view('pages/patients_history.php', [
				'patientHistory' => [
					'data' => $patientHistory,
					'name' => $patientHistory[0]['patient_name']
				]
			]);
		}

		return $this->index(0, 'asc', false, "Patient has no consults history. Do you want to start the first consult ?", $id);
	}

	public function validatePatient($data)
	{
		$validation =  \Config\Services::validation();

		$validation->setRules([
			'email' => ['rules' => 'required'],
			'name' => ['rules' => 'required'],
			'surname' => ['rules' => 'required'],
			'phone' => ['rules' => 'required'],
			'city_id' => ['rules' => 'required'],
			'address' => ['rules' => 'required'],
			'work_place' => ['rules' => 'required'],
			'occupation' => ['rules' => 'required'],
			'married' => ['rules' => 'required'],
			'birth_date' => ['rules' => 'required'],
			'cnp' => ['rules' => 'required'],
		]);

		if (!$validation->run($data)) {
			return false;
		}

		return true;
	}

	public function update($patientId)
	{
		if ($this->validatePatient($this->request->getPost())) {
			$this->patientsModel->updatePatient($this->request->getPost(), $patientId);
			$this->index(0, 'asc', false, "Patients data successfully updated !", $patientId);
		} else {
			$this->index(0, 'asc', true, "All fields are required !");
		}
	}

	public function post()
	{
		$buyersModel = new BuyersModel();

		if ($this->validatePatient($this->request->getPost())) {
			$patientId = $this->patientsModel->postPatient($this->request->getPost());
			$buyersModel->insertBuyer(['patient_id' => $patientId]);
			$this->index(0, 'asc', false, "Patient added !", $patientId);
		} else {
			$this->index(0, 'asc', true, "All fields are required !");
		}
	}
}
