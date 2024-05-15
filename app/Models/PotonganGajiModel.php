<?php

namespace App\Models;

use CodeIgniter\Model;

class PotonganGajiModel extends Model
{
    protected $table  = 'potongan_gaji';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['potongan', 'jml_potongan_bpjsk', 'jml_potongan_bpjskk', 'jml_potongan_pph'];

    public function getPotonganByNama($namaPotongan)
    {
        return $this->select('jml_potongan_bpjsk, jml_potongan_bpjskk, jml_potongan_pph')
            ->where('potongan', $namaPotongan)
            ->first();
    }    
    
}
