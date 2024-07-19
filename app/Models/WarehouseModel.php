<?php

namespace App\Models;

use CodeIgniter\Model;

class WarehouseModel extends Model
{
    protected $table            = 'warehouses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["uid", "name", "pj_user_uid"];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllWarehouseWithUser($start, $length, $searchValue = '')
    {
        $builder = $this->db->table('warehouses');
        $builder->select('warehouses.*, users.name as pj_name');
        $builder->join('users', 'users.uid = warehouses.pj_user_uid', 'left');

        if (!empty($searchValue)) {
            $builder->like('warehouses.name', $searchValue);
        }

        $totalData = $builder->countAllResults(false); // false agar tidak di-reset oleh countAllResults

        $builder->limit($length, $start);
        $query = $builder->get();

        $users = $query->getResultArray();

        return [
            'totalData' => $totalData,
            'warehouse' => $users,
        ];
    }
}
