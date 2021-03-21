<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceiptsModel extends Model
{

    function getReceipts()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('receipts_view');

        return $builder->get()->getResultArray();
    }

    function getConsultReceipt($consultId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('receipts_view');

        return $builder->where('consult_id', $consultId)->get()->getRowObject();
    }

    function insertReceipt($receipt){
        $db = \Config\Database::connect();
        $builder = $db->table('receipts');

        $builder->insert($receipt);
        return $db->insertID();
    }
}
