<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceiptsLineModel extends Model
{
    function getReceiptLine($receiptId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('receipts_line');

        return $builder->where('receipt_id', $receiptId)->get()->getResultArray();
    }
}
