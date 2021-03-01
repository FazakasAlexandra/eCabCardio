<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name_surname', 'user_name', 'is_admin'];

    public function getUsers()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->get()->getResult('array');
        return $query;
    }

}
