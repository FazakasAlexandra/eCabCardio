<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ExaminationsModel;

class ConsultsExaminationsModel extends Model
{
    function getExaminations($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consults_examinations_view');

        return $builder->where('consult_id', $consultId)->get()->getResultArray();
    }

    function insertConsultExamination($consultId, $examinationsIds)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consults_examinations');

        foreach ($examinationsIds as $examId) {
            $builder->insert([
                'consult_id' => $consultId,
                'examination_id' => $examId,
            ]);
        }
    }
}
