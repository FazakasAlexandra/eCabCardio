<?php

namespace App\Models;

use CodeIgniter\Model;

class ClinicModel extends Model

{
    function getClinicData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clinic');

        return $builder->get()->getRow();
    }
}
