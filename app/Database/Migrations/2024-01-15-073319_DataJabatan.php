<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataJabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jabatan'   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '120',
            ],
            'gaji_pokok'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tj_transport' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'uang_makan'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id_jabatan', true);
        $this->forge->createTable('data_jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('data_jabatan');
    }
}
