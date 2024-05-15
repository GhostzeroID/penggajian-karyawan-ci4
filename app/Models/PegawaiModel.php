<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'data_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['nik', 'nama_pegawai', 'username', 'password', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'telpon', 'email', 'jabatan', 'tanggal_masuk', 'status', 'photo', 'hak_akses'];

    public function cek_login($user, $pass)
    {
        return $this->where('username', $user)
            ->where('password', $pass)
            ->first();
    }
    public function getByUsernameAndPassword($username, $password)
    {
        return $this->where('username', $username)
            ->where('password', $password)
            ->first();
    }

    public function getGaji($nik)
    {
        return $this->where('nik', $nik)->first();
    }
    public function getDataForUsername($username)
    {
        return $this->where('username', $username)->findAll();
    }
    public function getNIKByUsername($username)
    {
        return $this->where('username', $username)
            ->select('nik')
            ->first();
    }
    public function gantiPassword($username, $password)
    {
        return $this->where('username', $username)
            ->set('password', $password)
            ->update();
    }
}
