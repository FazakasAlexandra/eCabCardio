<?php namespace App\Controllers;

use App\Models\CitysModel;
use App\Models\CountysModel;
use CodeIgniter\API\ResponseTrait;

class Counties extends BaseController
{
    use ResponseTrait;

	public function index($countyId)
	{
        $countiesModel = new CountysModel();

        return $this->respond([
            'status' => 201,
			'error' => null,
            'county' => $countiesModel->getSingle($countyId)
        ]);
	}
}
