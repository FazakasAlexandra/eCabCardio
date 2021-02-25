<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    function getPatientHistory($patientId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('history');

        return $builder->where('patient_id', $patientId)->get()->getResultArray();
    }

    function getConsultHistory($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('history');

        return $builder->where('consult_id', $consultId)->get()->getResultArray();
    }

    function getClinicHistory()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('history');

        return $builder->orderBy('date', 'DESC')->get()->getResultArray();
    }

    function getClinicHistoryInterval($from_date, $to_date)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('history');

        return $builder->where('date >=', $from_date)->where('date <=', $to_date)->get()->getResultArray();
    }
}
