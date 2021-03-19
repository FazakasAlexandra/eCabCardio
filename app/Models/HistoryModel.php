<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = 'history';

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
        return $this->table('history')->orderBy('date', 'DESC')->paginate(8);
    }

    function getClinicHistoryInterval($from_date, $to_date)
    {
        return $this->table('history')->orderBy('date', 'ASC')->where('date >=', $from_date)->where('date <=', $to_date)->get()->getResultArray();
        //return $this->table('history')->orderBy('date', 'ASC')->where('date >=', $from_date)->where('date <=', $to_date)->paginate(8);
    }
}
