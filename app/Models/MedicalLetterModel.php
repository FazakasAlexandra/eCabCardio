<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicalLetterModel extends Model

{
    function getMedicalLetter($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('medical_letter');

        return $builder->where('consult_id', $consultId)->get()->getRowObject();
    }
}
