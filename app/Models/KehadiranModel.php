<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = 'data_kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['bulan', 'tahun', 'nik', 'nama_pegawai', 'jenis_kelamin', 'nama_jabatan', 'hadir', 'sakit', 'alpha'];

    public function getFilteredData($bulan, $tahun)
    {
        return $this->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->findAll();
    }
    public function getFilteredDataNama($bulan, $tahun, $nama)
    {
        return $this->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('nama_pegawai', $nama)
            ->findAll();
    }

    public function getDataKehadiranByNik($nik,$jabatan, $bulan = null, $tahun = null)
    {
        $query = $this->select('nama_jabatan, hadir, sakit, alpha')
            ->where('nik', $nik);

        if ($bulan !== null) {
            $query->where('bulan', $bulan);
        }

        if ($tahun !== null) {
            $query->where('tahun', $tahun);
        }

        return $query->findAll();
    }

    public function insertDataAbsensi($data)
    {
        $this->db->table('data_absensi')->insert($data);
    }
}
