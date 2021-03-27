<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyersModel extends Model

{
    function getCompanyBuyer($companyId){
        $db = \Config\Database::connect();
        $builder = $db->table('buyers');

        return $builder->where('company_id', $companyId)->get()->getRowObject();
    }

    function getPatientBuyer($patientId){
        $db = \Config\Database::connect();
        $builder = $db->table('buyers');

        return $builder->where('patient_id', $patientId)->get()->getRowObject();
    }

    function insertBuyer($buyer)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('buyers');


        $builder->insert($buyer);
        return $db->insertID();
    }
}
