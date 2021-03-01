<?php

namespace App\Models;

use CodeIgniter\Model;

class CitysModel extends Model

{
    function getCityes()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('citys');

        return $builder->orderBy('city', 'ASC')->get()->getResultArray();
    }

    function getSingle($cityId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('citys');

        return $builder->where('id', $cityId)->get()->getRowObject();
    }
}
