<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\HistoryModel;
use CodeIgniter\API\ResponseTrait;

class Patients extends BaseController
{

	use ResponseTrait;

	public function __construct()
	{
		$this->patientsModel = new PatientsModel();
		$this->historyModel = new HistoryModel();
	}

	public function index($offset = 0, $order = 'asc', $msg = null, $patient_id = null)
	{
		echo view('templates/header.php');

		$data = $this->patientsModel->getPatients((int) $offset, $order);
		$data['offset'] = $offset;
		$data['order'] = $order;

		if ($msg) {
			$data['msg'] = $msg;
			$data['patient_id'] = $patient_id;
		}

		echo view('pages/patients.php', $data);
	}

	public function search()
	{
		echo view('templates/header.php');

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
		echo view('templates/header.php');
		$patientHistory = $this->historyModel->getPatientHistory($id);

		echo view('pages/patients_history.php', [
			'patientHistory' => [
				'data' => $patientHistory,
				'name' => $patientHistory[0]['patient_name']
			]
		]);
	}

	public function update($patientId)
	{
		$this->patientsModel->updatePatient($this->request->getPost(), $patientId);
		$this->index(0, 'asc', "Patient's data successfully updated !", $patientId);
	}

	public function post()
	{
		$patientId = $this->patientsModel->postPatient($this->request->getPost());
		$this->index(0, 'asc', "Patient successfully added !", $patientId);
	}

}
