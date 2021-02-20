<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultFilesModel extends Model

{
    function getConsultFiles($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consult_files');

        $consultImages = $builder->where('consult_id', $consultId)->get()->getResultArray();

        return $consultImages;
    }

    function insertConsultFiles($consultImages)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consult_files');

        $builder->insert($consultImages);
    }
}
