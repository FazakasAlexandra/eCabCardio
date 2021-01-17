<?php

namespace App\Controllers;

use App\Models\PatientsModel;

class Patients extends BaseController
{
	public function index($offset = 0, $order = 'asc')
	{
		echo view('templates/header.php');

		$model = new PatientsModel();
		$data['patients'] = $model->getPatients((int)$offset, $order);

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

		echo view('pages/patients.php', $data);

		die();
	}
}
