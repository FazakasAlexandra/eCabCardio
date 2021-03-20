<?php

namespace App\Controllers;

use App\Models\CompaniesModel;
use CodeIgniter\API\ResponseTrait;


class Companies extends BaseController
{
    use ResponseTrait;

	public function getSingle($company_id)
	{        
		$companiesModel = new CompaniesModel();

        return $this->respond([
			'status' => 201,
			'error' => null,
			'company' => $companiesModel->getSingle($company_id)
		]);
	}
}