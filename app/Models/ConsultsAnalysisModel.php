<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultsAnalysisModel extends Model

{
    function getAnalysis($consultId){
        $db = \Config\Database::connect();
        $builder = $db->table('consults_analysis_view');

        return $builder->where('consult_id', $consultId)->get()->getResultArray();
    }
}
