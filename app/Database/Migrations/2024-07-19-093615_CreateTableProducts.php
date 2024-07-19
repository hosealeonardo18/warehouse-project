<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProducts extends Migration
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

            'name' => [
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

            'warehouse_uid' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',  // Added constraint
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
        $this->forge->addForeignKey('warehouse_uid', 'warehouses', 'uid', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
