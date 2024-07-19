<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableStockRequest extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'uid' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],

            'product_uid' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',  // Added constraint
                'null'       => false,
            ],

            'user_uid' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',  // Added constraint
                'null'       => false,
            ],

            'qty' => [
                'type'       => 'INT',
                'constraint' => '10',  // Added constraint
                'null'       => false,
                'default'    => 0,
            ],

            'approved_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',  // Added constraint
                'null'       => true,
            ],

            'approved_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],

            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],

            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_uid', 'products', 'uid', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_uid', 'users', 'uid', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'users', 'uid', 'CASCADE', 'CASCADE');

        $this->forge->createTable('stock_requests');
    }

    public function down()
    {
        $this->forge->dropTable('stock_requests');
    }
}
