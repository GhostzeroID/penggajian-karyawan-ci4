<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKehadiran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kehadiran'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'bulan'          => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'tahun'          => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
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
            'hadir'          => [
                'type' => 'INT',
            ],
            'sakit'          => [
                'type' => 'INT',
            ],
            'alpha'          => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id_kehadiran', true);
        $this->forge->createTable('data_kehadiran');
    }

    public function down()
    {
        $this->forge->dropTable('data_kehadiran');
    }
}
