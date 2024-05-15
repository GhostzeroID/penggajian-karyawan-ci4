<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\KehadiranModel;
use App\Models\JabatanModel;

class DataAbsensi extends BaseController
{
    protected $PegawaiModel;
    protected $KehadiranModel;
    protected $JabatanModel;

    public function __construct()
    {
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
        $data['kehadiran'] = $this->KehadiranModel->getFilteredData($bulan, $tahun);

        $title = "Data Absensi";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/DataAbsensi', $data)
            . view('TemplateAdmin/Footer');
    }

    public function tambahData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }

        $data['pegawai'] = $this->PegawaiModel->findAll();

        $title = "Tambah Data Absensi";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/TambahDataAbsensi', $data)
            . view('TemplateAdmin/Footer');
    }

    public function tambahDataKehadiran()
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
            $validation->setRules($rules);

            if ($this->validate($rules, $errors)) {
                $bulan = $this->request->getPost('bulan');
                $tahun = $this->request->getPost('tahun');

                $dataPegawai = $this->PegawaiModel->findAll();

                foreach ($dataPegawai as $pegawai) {
                    $data = [
                        'nik' => $pegawai['nik'],
                        'bulan' => $bulan,
                        'tahun' => $tahun,
                        'nama_pegawai' => $pegawai['nama_pegawai'],
                        'jenis_kelamin' => $pegawai['jenis_kelamin'],
                        'nama_jabatan' => $pegawai['jabatan'],
                        'hadir' => 0,
                        'sakit' => 0,
                        'alpha' => 0
                    ];

                    $this->KehadiranModel->insert($data);
                }

                session()->setFlashdata('success', 'Data Absensi berhasil ditambahkan!');
                return redirect()->to(base_url('dataabsensi'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to(base_url('dataabsensi'));
            }
        }
    }


    public function editData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['kehadiran'] = $this->KehadiranModel->find($id);

        if (!$data['kehadiran']) {
            return redirect()->to(base_url('dataabsensi'))->with('errors', 'Data not found');
        }

        $title = "Edit Data Absensi";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/EditDataAbsensi', $data)
            . view('TemplateAdmin/Footer');
    }

    public function prosesEditData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $validation = \Config\Services::validation();
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'hadir' => 'required|numeric',
                'sakit' => 'required|numeric',
                'alpha' => 'required|numeric'
            ];
            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    'hadir' => $this->request->getPost('hadir'),
                    'sakit' => $this->request->getPost('sakit'),
                    'alpha' => $this->request->getPost('alpha')
                ];
                $id = $this->request->getPost('id_kehadiran');

                $this->KehadiranModel->update($id, $data);

                session()->setFlashdata('success', 'Data Kehadiran berhasil diperbarui!');

                return redirect()->to(base_url('dataabsensi'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());

                return redirect()->to(base_url('editdataabsensi/' . $this->request->getPost('id_kehadirann')));
            }
        }

        return redirect()->to(base_url('dataabsensi'));
    }

    public function cetakAbsensi()
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
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['kehadiran'] = $this->KehadiranModel->getFilteredData($bulan, $tahun);


        return view('Admin/CetakDataAbsensi', $data);
    }
    public function laporanAbsensi()
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
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['kehadiran'] = $this->KehadiranModel->getFilteredData($bulan, $tahun);

        $title = "Laporan Data Absensi";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/LaporanDataAbsensi', $data)
            . view('TemplateAdmin/Footer');
    }
    public function filterDataOrang()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $nama = $this->request->getPost('nama');

        if (empty($bulan) || empty($tahun) || empty($nama)) {
            $bulan = date('m');
            $tahun = date('Y');
            $nama = 'nama';
        }
        $data['pegawai'] = $this->PegawaiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['kehadiran'] = $this->KehadiranModel->getFilteredDataNama($bulan, $tahun, $nama);
        $title = "Laporan Data Absensi Per Pegawai";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/LaporanDataAbsensiOrang', $data)
            . view('TemplateAdmin/Footer');
    }



    public function hapusData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        if (empty($id) || !is_numeric($id)) {
            session()->setFlashdata('errors', 'ID Kehadiran tidak valid!');
        } else {
            $kehadiran = $this->KehadiranModel->find($id);

            if (!$kehadiran) {
                session()->setFlashdata('errors', 'Data Kehadiran tidak ditemukan!');
            } else {
                if ($this->KehadiranModel->delete($id)) {
                    session()->setFlashdata('success', 'Data Kehadiran berhasil dihapus!');
                } else {
                    session()->setFlashdata('errors', 'Gagal menghapus data Kehadiran. Silakan coba lagi!');
                }
            }
        }

        return redirect()->to(base_url('dataabsensi'));
    }
}
