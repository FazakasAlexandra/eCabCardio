<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ConsultsModel;

class Consults extends BaseController
{

	use ResponseTrait;

	public function index($patientId)
	{
		echo view('templates/header.php');
		echo'<h3>consult patient with id ' . (string) $patientId. ' </h3>';
	}

	public function getSingleConsult($consultId)
	{
		$consultsModel = new ConsultsModel();

		return $this->respond([
			'status' => 201,
			'error' => null,
			'consult' => $consultsModel->getConsult($consultId),
		]);
	}

}
