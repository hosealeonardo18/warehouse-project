<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table            = 'stock_requests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["uid", "product_uid", "user_uid", "qty", "approved_at", "approved_by"];

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

    public function getAllStockRequestWithRelation($user, $start, $length, $searchValue)
    {
        $builder = $this->db->table('stock_requests');
        $builder->select(
            '
        stock_requests.*, 
        users.name as user_name, 
        approved.name as approved_name, 
        products.name as product_name, 
        products.warehouse_uid'
        );
        $builder->join('users', 'users.uid = stock_requests.user_uid', 'left');
        $builder->join('users as approved', 'approved.uid = stock_requests.approved_by', 'left');
        $builder->join('products', 'products.uid = stock_requests.product_uid', 'left');
        $builder->where('stock_requests.user_uid', $user);

        if (!empty($searchValue)) {
            $builder->like('users.name', $searchValue);
        }

        $totalData = $builder->countAllResults(false);

        $builder->limit($length, $start);
        $query = $builder->get();

        $results = $query->getResultArray();

        $stockRequests = [];

        foreach ($results as $row) {
            $stockRequestId = $row['id'];

            if (!isset($stockRequests[$stockRequestId])) {
                $stockRequests[$stockRequestId] = [
                    'id' => $row['id'],
                    'uid' => $row['uid'],
                    'user_uid' => $row['user_uid'],
                    'qty' => $row['qty'],
                    'approved_by' => $row['approved_by'],
                    'user_name' => $row['user_name'],
                    'approved_name' => $row['approved_name'],
                    'product_details' => [],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                ];
            }

            // Add product details
            $stockRequests[$stockRequestId]['product_details'] = [
                'product_uid' => $row['product_uid'],
                'product_name' => $row['product_name'],
                'warehouse_uid' => $row['warehouse_uid'],
            ];
        }

        return [
            'totalData' => $totalData,
            'stock' => array_values($stockRequests),
        ];
    }
}
