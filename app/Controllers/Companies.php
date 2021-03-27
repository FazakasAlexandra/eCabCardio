<?php

namespace App\Controllers;

use App\Models\CompaniesModel;
use App\Models\BuyersModel;
use CodeIgniter\API\ResponseTrait;

class Companies extends BaseController
{
	use ResponseTrait;

	public function getSingle($company_id)
	{
		$companiesModel = new CompaniesModel();

		return $this->respond([
			'status' => 200,
			'error' => null,
			'company' => $companiesModel->getSingle($company_id)
		]);
	}

	public function insertCompany()
	{
		$companiesModel = new CompaniesModel();
		$buyersModel = new BuyersModel();
		$company_id = $companiesModel->insertCompany($this->request->getJSON('true'));

		return $this->respond([
			'status' => 201,
			'error' => null,
			'buyer_id' => $buyersModel->insertBuyer(['company_id' => $company_id])
		]);
	}
}
