<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\PatientsHistoryModel;

class Patients extends BaseController
{
	public function index($offset = 0, $order = 'asc')
	{
		echo view('templates/header.php');

		$model = new PatientsModel();
		$data = $model->getPatients((int) $offset, $order);
		$data['offset'] = $offset;
		$data['order'] = $order;

		echo view('pages/patients.php', $data);

		die();
	}

	public function search()
	{
		echo view('templates/header.php');

		$model = new PatientsModel();

		if ($this->request->getGet('search-criteria')) {
			$data['patients'] = $model->search([
				$this->request->getGet('search-criteria') => $this->request->getGet('search-value')
			]);
		} else {
			$data['patients'] = $model->search($this->request->getGet());
		}

		$data['records'] = count($data['patients']);
		$data['offset'] = 0;
		$data['order'] = 'asc';

		echo view('pages/patients.php', $data);
		
		die();
	}

	public function history($id)
	{
		echo view('templates/header.php');

		$historyModel = new PatientsHistoryModel();
		$patientHistory = $historyModel->getPatientHistory($id);

 		echo view('pages/patients_history.php', [
			'patientHistory' => [
				'data' => $patientHistory,
				'name' => $patientHistory[0]['patient_name']
			]
		]);
	}



	/* EXAMPLES */


	
	public function edit($id)
	{
		echo view('templates/header.php');
		echo '<h3> edit patient with id ' . (string)$id . '</h3>';
	}

	public function add()
	{
		echo view('templates/header.php');
		// view-ul cu formul pentru add patient
		echo view('pages/add_form.php');
	}

	public function submit()
	{
		$data = $this->request->getPost();
		$data['is_admin'] = 0;
		var_dump($data);

		$model = new PatientsModel();
		$model->insertPatient($data);
	}

	public function submitEdit()
	{
		$data = $this->request->getPost();
		$data['is_admin'] = 0;
		var_dump($data);

		$model = new PatientsModel();
		$model->editPatient($data);
	}
}
