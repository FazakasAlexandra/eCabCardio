<?php namespace App\Controllers;

use App\Models\CitysModel;
use CodeIgniter\API\ResponseTrait;

class Cities extends BaseController
{
    use ResponseTrait;

	public function index()
	{
        $citiesModel = new CitysModel();

        return $this->respond([
            'status' => 201,
			'error' => null,
            'cities' => $citiesModel->getCityes()
        ]);
	}
}
