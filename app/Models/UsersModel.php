<?php

namespace App\Models;

use App\Models\RoleModel;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["uid", "name", "email", "password", "role_id"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $hasOne = [
        'role' => [
            'model' => 'App\Models\RoleModel',
            'foreign_key' => 'id',
            'local_key' => 'role_id'
        ]
    ];

    // Method untuk melakukan query dengan relasi
    public function getUsersWithRoles($start, $length, $searchValue = '')
    {
        $builder = $this->db->table('users');
        $builder->select('users.*, roles.name as role_name');
        $builder->join('roles', 'roles.id = users.role_id', 'left');

        if (!empty($searchValue)) {
            $builder->like('users.name', $searchValue);
        }

        $totalData = $builder->countAllResults(false); // false agar tidak di-reset oleh countAllResults

        $builder->limit($length, $start);
        $query = $builder->get();

        $users = $query->getResultArray();

        return [
            'totalData' => $totalData,
            'users' => $users,
        ];
    }
}
