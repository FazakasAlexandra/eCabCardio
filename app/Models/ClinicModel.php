<?php

namespace App\Models;

use CodeIgniter\Model;

class ClinicModel extends Model
{
    protected $table = 'clinic';
    protected $primaryKey = 'id';
    protected $allowedFields = ['logo', 'clinic_name', 'fiscal_no', 'orc_number', 'phone', 'fax', 'bank_account', 'bank', 'vat', 'receipt_series', 'address'];

    function getClinicData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clinic');
        return $builder->get()->getRow();
    }

    function getLogo(){
        $db = \Config\Database::connect();
        $builder = $db->table('clinic');
        $builder->select('logo');
        return $builder->get()->getResult('array');
    }
}
