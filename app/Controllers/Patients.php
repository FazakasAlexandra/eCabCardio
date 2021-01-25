<?php

namespace App\Controllers;

use App\Models\PatientsModel;

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
		echo view('templates/footer.php');

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
		echo view('templates/footer.php');

		die();
	}

	public function history($id)
	{
		echo view('templates/header.php');
		echo '<h3> history of patient with id ' . (string)$id . '</h3>';
	}

	public function edit($id)
	{
		echo view('templates/header.php');
		echo '<h3> edit patient with id ' . (string)$id . '</h3>';
	}

	public function add()
	{
		echo view('templates/header.php');
		echo '<h3> edit patient page </h3>';
	}
}
