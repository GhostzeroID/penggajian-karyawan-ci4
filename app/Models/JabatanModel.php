<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'data_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['nama_jabatan', 'gaji_pokok', 'tj_transport', 'uang_makan'];

    public function findJabatanByNama($namaJabatan)
    {
        return $this->where('nama_jabatan', $namaJabatan)
        ->first();
    }
    

    public function getGajiPokokByJabatan($namaJabatan)
    {
        $result = $this->where('nama_jabatan', $namaJabatan)->first();

        return ($result) ? $result['gaji_pokok'] : 0;
    }
}
