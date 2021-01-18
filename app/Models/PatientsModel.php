<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    public function getPatients($offset, $order)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('patients');

        return [
            'records' => $builder->countAll(),
            'patients' => $builder->orderBy('name', $order)->get(5, $offset)->getResult('array')
        ];
    }

    public function search($searchList)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('patients');

        return $builder->where($searchList)->get()->getResult('array');
    }
}
