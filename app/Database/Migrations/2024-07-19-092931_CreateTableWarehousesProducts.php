<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableWarehousesProducts extends Migration
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

            'pj_user_uid' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',  // Added constraint
                'null'       => false,
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
        $this->forge->addForeignKey('pj_user_uid', 'users', 'uid', 'CASCADE', 'CASCADE');
        $this->forge->createTable('warehouses');
    }

    public function down()
    {
        $this->forge->dropTable('warehouses');
    }
}
