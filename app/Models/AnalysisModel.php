<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalysisModel extends Model
{
    public function getAnalysis()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('analysis');
        return $builder->get()->getResult('array');
    }

    function getAnalysisPrice($analysisId){
        $db = \Config\Database::connect();
        $builder = $db->table('analysis');

        $analysis = $builder->where('id',$analysisId)->get()->getRowObject();
        return $analysis->price;
    }
}
