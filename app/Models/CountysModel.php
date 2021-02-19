<?php

namespace App\Models;

use CodeIgniter\Model;

class CountysModel extends Model

{
    function getSingle($countyId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('countys');

        return $builder->where('id', $countyId)->get()->getRowObject();
    }
}
