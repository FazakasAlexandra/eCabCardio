<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsHistoryModel extends Model

{
    function getPatientHistory($patientId){
        $db = \Config\Database::connect();
        $builder = $db->table('patients_history');

        return $builder->where('patient_id', $patientId)->get()->getResultArray();
    }
}
