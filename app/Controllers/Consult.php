<?php namespace App\Controllers;

class Consult extends BaseController
{
	public function index($id)
	{
		echo view('templates/header.php');
		echo'<h3>consult patient with id ' . (string)$id . ' </h3>';

	}

}
