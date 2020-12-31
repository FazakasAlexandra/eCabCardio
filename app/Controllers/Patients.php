<?php namespace App\Controllers;

class Patients extends BaseController
{
	public function index()
	{
		echo view('templates/header.php');
		echo view('pages/patients.php');
		echo view('templates/footer.php');
	}

}
