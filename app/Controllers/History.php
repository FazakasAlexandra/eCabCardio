<?php namespace App\Controllers;

class History extends BaseController
{
	public function index()
	{
		echo view('templates/header.php');
		echo view('pages/history.php');
		echo view('templates/footer.php');
	}

}
