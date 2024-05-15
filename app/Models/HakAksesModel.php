<?php

namespace App\Models;

use CodeIgniter\Model;

class HakAksesModel extends Model
{
    protected $table = 'hak_akses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['keterangan', 'hakakses'];
}
