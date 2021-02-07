<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultsExaminationsModel extends Model

{
    function getExaminations($consultId){
        $db = \Config\Database::connect();
        $builder = $db->table('consults_examinations_view');

        return $builder->where('consult_id', $consultId)->get()->getResultArray();
    }
}
