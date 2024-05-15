<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\JabatanModel;
use App\Models\KehadiranModel;
use App\Models\DataGajiModel;

class Dashboard extends BaseController
{

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['title'] = "Dashboard";

        $pegawaiModel = new PegawaiModel();
        $data['pegawai'] = $pegawaiModel->countAll();

        $gaji = new DataGajiModel();
        $data['gaji'] = $gaji->countAll();

        $jabatanModel = new JabatanModel();
        $data['jabatan'] = $jabatanModel->countAll();

        $kehadiranModel = new KehadiranModel();
        $data['kehadiran'] = $kehadiranModel->countAll();

        echo view('TemplatePegawai/Header', $data);
        echo view('TemplatePegawai/Sidebar');
        echo view('Pegawai/Dashboard', $data);
        echo view('TemplatePegawai/Footer');
    }
}
