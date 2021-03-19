<?php

namespace App\Models;

use CodeIgniter\Model;

class CompaniesModel extends Model

{
    function getCompanies()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('companies');

        return $builder->get()->getResultArray();
    }
}
