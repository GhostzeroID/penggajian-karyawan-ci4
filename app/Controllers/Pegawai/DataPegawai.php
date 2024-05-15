<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\JabatanModel;

class DataPegawai extends BaseController
{
    protected $PegawaiModel;
    protected $JabatanModel;

    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
        $this->JabatanModel = new JabatanModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $username = session()->get('username');
        $data['pegawai'] = $this->PegawaiModel->getDataForUsername($username);
        $title = "Data Pegawai";

        return view('TemplatePegawai/Header', ['title' => $title])
            . view('TemplatePegawai/Sidebar')
            . view('Pegawai/DataPegawai', $data)
            . view('TemplatePegawai/Footer');
    }
}
