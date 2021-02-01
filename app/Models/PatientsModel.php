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

    public function getSingle($patientId){
        $db = \Config\Database::connect();
        $builder = $db->table('patients');

        return $builder->where(['id', $patientId])->get()->getResultArray();
    }



    /* EXAMPLES */

    public function insertPatient($data){
        // functia care pune date in baza de date
        $db = \Config\Database::connect();
        // tabelul folosit din baza de date
        $builder = $db->table('users');

        $builder->insert($data);
    }

    public function editPatients($id){
        // functia care editeaza date din baza de date
    }

}
