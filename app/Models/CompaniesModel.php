<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CountysModel;

class CompaniesModel extends Model

{
    function getCompanies()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('companies');

        return $builder->get()->getResultObject();
    }

    function getSingle($companyId){
        $db = \Config\Database::connect();
        $builder = $db->table('companies');

        $company = $builder->where('id', $companyId)->get()->getRowObject();

        $countysModel = new CountysModel();
        $company->county = $countysModel->getSingle($company->county_id)->county;
        unset($company->county_id);

        return $company;
    }
}
