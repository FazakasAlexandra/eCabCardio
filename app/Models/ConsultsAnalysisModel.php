<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\AnalysisModel;

class ConsultsAnalysisModel extends Model

{
    function getAnalysis($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consults_analysis_view');

        return $builder->where('consult_id', $consultId)->get()->getResultArray();
    }

    function insertConsultAnalysis($consultId, $analysisIds)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consults_analysis');

        $analysisModel = new AnalysisModel();

        foreach ($analysisIds as $anaId) {
            $builder->insert([
                'consult_id' => $consultId,
                'analysis_id' => $anaId,
                'price' => $analysisModel->getAnalysisPrice($anaId)
            ]);
        }
    }

}
