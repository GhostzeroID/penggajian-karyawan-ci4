<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik'             => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_pegawai'    => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
            'jenis_kelamin'   => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tgl_lahir'   => [
                'type'       => 'DATE',
                'constraint' => '',
            ],
            'alamat'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'telpon'   => [
                'type'       => 'INT',
                'constraint' => '50',
            ],
            'email'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jabatan'         => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tanggal_masuk'   => [
                'type' => 'DATE',
            ],
            'status'          => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'photo'           => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
        ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('data_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('data_pegawai');
    }
}
