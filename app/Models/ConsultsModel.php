<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultsModel extends Model
{
    function getConsult($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consults');

        $consult = $builder->where('id', $consultId)->get()->getRowObject();

        return $consult;
    }

    function insertConsult($consult)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consults');

        unset($consult['images']);
        unset($consult['examinations']);
        unset($consult['analysis']);

        $builder->insert($consult);
        return $db->insertID();
    }
}
