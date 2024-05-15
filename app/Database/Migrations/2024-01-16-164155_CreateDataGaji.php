<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePotonganGaji extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gaji' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'bulan'          => [
                'type'       => 'INT',
                'constraint' => 15,
            ],
            'tahun'          => [
                'type'       => 'INT',
                'constraint' => 15,
            ],
            'nik'            => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_karyawan'  => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
            'jenis_kelamin'  => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_jabatan'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'gaji_pokok'   => [
                'type'       => 'INT',
                'constraint' => 50,
            ],
            'tj_transport' => [
                'type'       => 'INT',
                'constraint' => 50,
            ],
            'uang_makan'   => [
                'type'       => 'INT',
                'constraint' => 50,
            ],
            'pbpjsk' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'pbpjskk' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'pph' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'total_gaji' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('id_gaji', true);
        $this->forge->createTable('data_gaji');
    }

    public function down()
    {
        $this->forge->dropTable('data_gaji');
    }
}
