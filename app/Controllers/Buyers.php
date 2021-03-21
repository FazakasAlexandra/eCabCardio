<?php namespace App\Controllers;

use App\Models\BuyersModel;
use CodeIgniter\API\ResponseTrait;

class Buyers extends BaseController
{
    use ResponseTrait;

	public function getCompanyBuyerId($companyId)
	{
        $buyersModel = new BuyersModel();

        return $this->respond([
            'status' => 201,
			'error' => null,
            'buyer_id' => $buyersModel->getCompanyBuyer($companyId)->id
        ]);
	}

    public function getPatientBuyerId($patientId)
	{
        $buyersModel = new BuyersModel();

        return $this->respond([
            'status' => 201,
			'error' => null,
            'buyer_id' => $buyersModel->getPatientBuyer($patientId)->id
        ]);
	}
}
