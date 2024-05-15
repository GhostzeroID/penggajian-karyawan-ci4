<?php

namespace App\Controllers\Admin;

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
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        if (empty($bulan) || empty($tahun)) {
            $bulan = date('m');
            $tahun = date('Y');
        }
        $data['pegawai'] = $this->PegawaiModel->findAll();
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['gaji'] = $this->DataGajiModel->getFilteredData($bulan, $tahun);

        $title = "Data Gaji";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/DataGaji', $data)
            . view('TemplateAdmin/Footer');
    }

    public function tambahData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pegawai'] = $this->PegawaiModel->findAll();
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();

        $title = "Tambah Data Gaji";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/TambahDataGaji', $data)
            . view('TemplateAdmin/Footer');
    }

    public function tambahDataGaji()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }

        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'bulan' => 'required|numeric',
                'tahun' => 'required|numeric',
            ];

            $errors = [
                'bulan' => [
                    'required' => 'Bulan harus diisi.',
                    'numeric' => 'Bulan harus berupa angka.',
                ],
                'tahun' => [
                    'required' => 'Tahun harus diisi.',
                    'numeric' => 'Tahun harus berupa angka.',
                ],
            ];

            $validation->setRules($rules, $errors);

            if ($validation->withRequest($this->request)->run()) {
                $bulan = $this->request->getPost('bulan');
                $tahun = $this->request->getPost('tahun');

                $dataPegawai = $this->PegawaiModel->findAll();

                foreach ($dataPegawai as $pegawai) {
                    $jabatan = $this->JabatanModel->findJabatanByNama($pegawai['jabatan']);

                    // Tambahkan pengecekan apakah $jabatan null atau tidak
                    if ($jabatan === null || $jabatan['gaji_pokok'] === null || $jabatan['tj_transport'] === null || $jabatan['uang_makan'] === null) {
                        // Pesan error jika data jabatan atau tunjangan tidak lengkap
                        session()->setFlashdata('errors', 'Data jabatan atau tunjangan tidak lengkap untuk ' . $pegawai['nama_pegawai']);
                        return redirect()->to(base_url('datagaji'));
                    }

                    $potonganData = $this->PotonganGajiModel->getPotonganByNama($pegawai['jabatan']);
                    $jmlPotonganBPJSK = $potonganData['jml_potongan_bpjsk'];
                    $jmlPotonganBPJSKK = $potonganData['jml_potongan_bpjskk'];
                    $jmlPotonganPPH = $potonganData['jml_potongan_pph'];

                    $dataKehadiran = $this->KehadiranModel->getDataKehadiranByNik($pegawai['nik'], $bulan, $tahun);
                    $sakit = array_sum(array_column($dataKehadiran, 'sakit'));
                    $alpha = array_sum(array_column($dataKehadiran, 'alpha'));

                    $totalGaji = $jabatan['gaji_pokok'] + $jabatan['tj_transport'] + $jabatan['uang_makan'] -
                        $jmlPotonganBPJSK - $jmlPotonganBPJSKK;

                    $potonganPphTotal = ($sakit + $alpha) * $jmlPotonganPPH;

                    $totalGaji -= $potonganPphTotal;

                    $existingData = $this->DataGajiModel
                        ->where([
                            'nik' => $pegawai['nik'],
                            'nama_jabatan' => $jabatan['nama_jabatan'],
                            'bulan' => $bulan,
                            'tahun' => $tahun
                        ])
                        ->first();

                    $data = [
                        'bulan' => $bulan,
                        'tahun' => $tahun,
                        'nik' => $pegawai['nik'],
                        'nama_pegawai' => $pegawai['nama_pegawai'],
                        'jenis_kelamin' => $pegawai['jenis_kelamin'],
                        'nama_jabatan' => $pegawai['jabatan'],
                        'gaji_pokok' => $jabatan['gaji_pokok'],
                        'tj_transport' => $jabatan['tj_transport'],
                        'uang_makan' => $jabatan['uang_makan'],
                        'pbpjsk' => $jmlPotonganBPJSK,
                        'pbpjskk' => $jmlPotonganBPJSKK,
                        'pph' => $potonganPphTotal,
                        'total_gaji' => $totalGaji
                    ];

                    if ($existingData) {
                        $this->DataGajiModel->update($existingData['id_gaji'], $data);
                    } else {
                        $this->DataGajiModel->insert($data);
                    }
                }

                session()->setFlashdata('success', 'Data Gaji berhasil ditambahkan!');
                return redirect()->to(base_url('datagaji'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to(base_url('datagaji'));
            }
        }
    }


    // public function tambahDataGaji()
    // {
    //     if (!session()->get('logged_in')) {
    //         return redirect()->to(base_url('login1'));
    //     }
    //     $validation = \Config\Services::validation();

    //     if ($this->request->getMethod() === 'post') {
    //         $rules = [
    //             'bulan' => 'required|numeric',
    //             'tahun' => 'required|numeric',
    //         ];

    //         $errors = [
    //             'bulan' => [
    //                 'required' => 'Bulan harus diisi.',
    //                 'numeric' => 'Bulan harus berupa angka.',
    //             ],
    //             'tahun' => [
    //                 'required' => 'Tahun harus diisi.',
    //                 'numeric' => 'Tahun harus berupa angka.',
    //             ],
    //         ];

    //         $validation->setRules($rules, $errors);

    //         if ($validation->withRequest($this->request)->run()) {
    //             $bulan = $this->request->getPost('bulan');
    //             $tahun = $this->request->getPost('tahun');

    //             $dataPegawai = $this->PegawaiModel->findAll();

    //             foreach ($dataPegawai as $pegawai) {
    //                 $jabatan = $this->JabatanModel->findJabatanByNama($pegawai['jabatan']);
    //                 $potonganData = $this->PotonganGajiModel->getPotonganByNama($pegawai['jabatan']);
    //                 $jmlPotonganBPJSK = $potonganData['jml_potongan_bpjsk'];
    //                 $jmlPotonganBPJSKK = $potonganData['jml_potongan_bpjskk'];
    //                 $jmlPotonganPPH = $potonganData['jml_potongan_pph'];

    //                 if ($jmlPotonganBPJSK !== null && $jmlPotonganBPJSKK !== null) {
    //                     $dataKehadiran = $this->KehadiranModel->getDataKehadiranByNik($pegawai['nik'], $bulan, $tahun);
    //                     $sakit = array_sum(array_column($dataKehadiran, 'sakit'));
    //                     $alpha = array_sum(array_column($dataKehadiran, 'alpha'));


    //                     $totalGaji = $jabatan['gaji_pokok'] + $jabatan['tj_transport'] + $jabatan['uang_makan'] -
    //                         $jmlPotonganBPJSK - $jmlPotonganBPJSKK;

    //                     $potonganPphTotal = ($sakit + $alpha) * $jmlPotonganPPH;

    //                     $totalGaji -= $potonganPphTotal;

    //                     $existingData = $this->DataGajiModel
    //                         ->where([
    //                             'nik' => $pegawai['nik'],
    //                             'nama_jabatan' => $jabatan['nama_jabatan'],
    //                             'bulan' => $bulan,
    //                             'tahun' => $tahun
    //                         ])
    //                         ->first();

    //                     $data = [
    //                         'bulan' => $bulan,
    //                         'tahun' => $tahun,
    //                         'nik' => $pegawai['nik'],
    //                         'nama_pegawai' => $pegawai['nama_pegawai'],
    //                         'jenis_kelamin' => $pegawai['jenis_kelamin'],
    //                         'nama_jabatan' => $pegawai['jabatan'],
    //                         'gaji_pokok' => $jabatan['gaji_pokok'],
    //                         'tj_transport' => $jabatan['tj_transport'],
    //                         'uang_makan' => $jabatan['uang_makan'],
    //                         'pbpjsk' => $jmlPotonganBPJSK,
    //                         'pbpjskk' => $jmlPotonganBPJSKK,
    //                         'pph' => $potonganPphTotal,
    //                         'total_gaji' => $totalGaji
    //                     ];

    //                     if ($existingData) {
    //                         $this->DataGajiModel->update($existingData['id_gaji'], $data);
    //                     } else {
    //                         $this->DataGajiModel->insert($data);
    //                     }
    //                 }
    //             }

    //             session()->setFlashdata('success', 'Data Gaji berhasil ditambahkan!');
    //             return redirect()->to(base_url('datagaji'));
    //         } else {
    //             session()->setFlashdata('errors', $validation->getErrors());
    //             return redirect()->to(base_url('datagaji'));
    //         }
    //     }
    // }

    public function cetakGaji()
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
        $data['pegawai'] = $this->PegawaiModel->findAll();
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['gaji'] = $this->DataGajiModel->getFilteredData($bulan, $tahun);


        return view('Admin/CetakDataGaji', $data);
    }
    public function laporanSlipGaji()
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

        $data['pegawai'] = $this->PegawaiModel->findAll();
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['gaji'] = $this->DataGajiModel->getFilteredData($bulan, $tahun);

        $title = "Laporan Slip Gaji";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/LaporanDataGaji', $data)
            . view('TemplateAdmin/Footer');
    }
    public function filterData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $nama = $this->request->getPost('nama');

        if (empty($bulan) || empty($tahun)) {
            $bulan = date('m');
            $tahun = date('Y');
            $tahun = 'nama';
        }

        $data['pegawai'] = $this->PegawaiModel->findAll();
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['gaji'] = $this->DataGajiModel->getFilteredDataNama($bulan, $tahun, $nama);

        $title = "Laporan Slip Gaji Per Pegawai";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/LaporanDataGajiOrang', $data)
            . view('TemplateAdmin/Footer');
    }
    public function hapusData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        if (empty($id) || !is_numeric($id)) {
            session()->setFlashdata('errors', 'ID Gaji tidak valid!');
        } else {
            $gaji = $this->DataGajiModel->find($id);

            if (!$gaji) {
                session()->setFlashdata('errors', 'Data Gaji tidak ditemukan!');
            } else {
                if ($this->DataGajiModel->delete($id)) {
                    session()->setFlashdata('success', 'Data Gaji berhasil dihapus!');
                } else {
                    session()->setFlashdata('errors', 'Gagal menghapus data Gaji. Silakan coba lagi!');
                }
            }
        }

        return redirect()->to(base_url('datagaji'));
    }
}
