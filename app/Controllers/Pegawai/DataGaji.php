<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DataGajiModel;
use App\Models\PotonganGajiModel;
use App\Models\PegawaiModel;
use App\Models\KehadiranModel;
use App\Models\JabatanModel;

class DataGaji extends BaseController
{
    protected $DataGajiModel;
    protected $PotonganGajiModel;
    protected $PegawaiModel;
    protected $KehadiranModel;
    protected $JabatanModel;

    public function __construct()
    {
        $this->DataGajiModel = new DataGajiModel();
        $this->PotonganGajiModel = new PotonganGajiModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->KehadiranModel = new KehadiranModel();
        $this->JabatanModel = new JabatanModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $nik = session()->get('nik');

        $data['gaji'] = $this->DataGajiModel->getGajiByNIK($nik);

        $title = "Data Gaji";

        return view('TemplatePegawai/Header', ['title' => $title])
            . view('TemplatePegawai/Sidebar')
            . view('pegawai/LaporanDataGajiOrang', $data)
            . view('TemplatePegawai/Footer');
    }

    public function filterData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        if (empty($bulan) || empty($tahun)) {
            $bulan = date('m');
            $tahun = date('Y');
        }

        $username = session()->get('username');

        $nik = $this->PegawaiModel->getNIKByUsername($username);


        $data['pegawai'] = $this->PegawaiModel->getDataForUsername($nik);

        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();

        $data['gaji'] = $this->DataGajiModel->getFilteredDataPegawai($bulan, $tahun, $nik);

        $title = "Data Gaji";
        return view('TemplatePegawai/Header', ['title' => $title])
            . view('TemplatePegawai/Sidebar')
            . view('Pegawai/LaporanDataGajiOrang', $data)
            . view('TemplatePegawai/Footer');
    }
}
