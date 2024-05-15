<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePotonganGaji extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'potongan' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'jml_potongan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('potongan_gaji');
    }

    public function down()
    {
        $this->forge->dropTable('potongan_gaji');
    }
}
