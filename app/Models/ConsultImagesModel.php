<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultImagesModel extends Model

{
    function getConsultImages($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consult_images');

        $consultImages = $builder->where('consult_id', $consultId)->get()->getResultArray();

        return $consultImages;
    }

    function insertConsultImages($consultImages)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consult_images');

        $builder->insert($consultImages);
    }
}
