<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["name"];

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

    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllRoles($start, $length, $searchValue = '')
    {
        $builder = $this->db->table('roles');

        // Filter berdasarkan search value
        if (!empty($searchValue)) {
            $builder->like('name', $searchValue);
        }

        // Hitung total data sebelum limit dan offset diterapkan
        $totalData = $builder->countAllResults(false); // false agar tidak di-reset oleh countAllResults

        // Terapkan limit dan offset
        $builder->limit($length, $start);
        $query = $builder->get();

        $roles = $query->getResultArray();

        return [
            'totalData' => $totalData,
            'roles' => $roles,
        ];
    }
}
