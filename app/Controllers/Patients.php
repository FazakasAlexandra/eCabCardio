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

	public function search($criteria, $value)
	{
		echo view('templates/header.php');

		$model = new PatientsModel();
		$data['patients'] = $model->regularPatientsSearch($criteria, $value);

		echo view('pages/patients.php', $data);

		die();
	}

	public function advancedSearch($name, $surname, $cnp)
	{
		echo view('templates/header.php');

		$model = new PatientsModel();
		$data['patients'] = $model->advancedPatientsSearch($name, $surname, $cnp);

		echo view('pages/patients.php', $data);

		die();
	}
}
