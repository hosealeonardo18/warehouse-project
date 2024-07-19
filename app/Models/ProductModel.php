<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["uid", "name", "qty", "warehouse_uid"];

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

    public function getAllProductWithWarehouse($start, $length, $searchValue = '')
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, warehouses.name as warehouse_name');
        $builder->join('warehouses', 'warehouses.uid = products.warehouse_uid', 'left');

        if (!empty($searchValue)) {
            $builder->like('products.name', $searchValue);
        }

        $totalData = $builder->countAllResults(false); // false agar tidak di-reset oleh countAllResults

        $builder->limit($length, $start);
        $query = $builder->get();

        $product = $query->getResultArray();

        return [
            'totalData' => $totalData,
            'product' => $product,
        ];
    }

    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->get();
        return $query->getResult();
    }
}
