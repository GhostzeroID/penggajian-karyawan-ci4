<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGajiModel extends Model
{
    protected $table = 'data_gaji';
    protected $primaryKey = 'id_gaji';
    protected $allowedFields = ['bulan', 'tahun', 'nik', 'nama_pegawai', 'jenis_kelamin', 'nama_jabatan', 'gaji_pokok', 'tj_transport', 'uang_makan', 'pbpjsk', 'pbpjskk', 'pph', 'total_gaji'];

    public function getFilteredData($bulan, $tahun)
    {
        return $this->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->findAll();
    }
    public function getFilteredDataPegawai($bulan, $tahun, $nik)
    {
        return $this->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('nik', $nik)
            ->findAll();
    }
    public function getFilteredDataNama($bulan, $tahun, $nama)
    {
        return $this->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('nama_pegawai', $nama)
            ->findAll();
    }


    public function insertDataGaji($data)
    {
        $this->db->table('data_gaji')->insert($data);
    }
    public function getGajiByNik($nik)
    {
        return $this->where('nik', $nik)->first();
    }
}
