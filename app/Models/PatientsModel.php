<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    // Third Option: use the query builder
    public function getPatients($offset, $order)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('patients');

        return $builder->orderBy('id', $order)->get(5, $offset)->getResult('array');
    }

    public function regularPatientsSearch($criteria, $value)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('patients');

        return $builder->where($criteria, $value)->get()->getResult('array');
    }

    public function advancedPatientsSearch($name, $surname, $cnp)
    {
        $searchList = array('name' => $name, 'surname' => $surname, 'cnp' => $cnp);

        $db = \Config\Database::connect();
        $builder = $db->table('patients');

        return $builder->where($searchList)->get()->getResult('array');
    }
}
