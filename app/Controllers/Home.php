<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('templates/header.php', $this->logo);
		echo view('pages/home.php');
		echo view('templates/footer.php');
	}

}
