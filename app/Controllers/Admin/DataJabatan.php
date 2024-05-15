<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class DataJabatan extends BaseController
{
    protected $JabatanModel;

    public function __construct()
    {
        $this->JabatanModel = new JabatanModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }

        $data['jabatan'] = $this->JabatanModel->findAll();
        $title = "Data Jabatan";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/DataJabatan', $data)
            . view('TemplateAdmin/Footer');
    }

    public function tambahData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $title = "Tambah Data Jabatan";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/TambahDataJabatan')
            . view('TemplateAdmin/Footer');
    }

    public function tambahDataJabatan()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama_jabatan' => 'required',
                'gaji_pokok' => 'required|numeric',
                'tj_transport' => 'required|numeric',
                'uang_makan' => 'required|numeric',
            ];

            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    'nama_jabatan' => $this->request->getPost('nama_jabatan'),
                    'gaji_pokok' => $this->request->getPost('gaji_pokok'),
                    'tj_transport' => $this->request->getPost('tj_transport'),
                    'uang_makan' => $this->request->getPost('uang_makan'),
                ];

                $this->JabatanModel->insert($data);

                session()->setFlashdata('success', 'Data Jabatan berhasil ditambahkan!');

                return redirect()->to(base_url('datajabatan'));
            } else {
                session()->setFlashdata('errors', 'Data Jabatan gagal ditambahkan!');

                return redirect()->to(base_url('datajabatan'));
            }
        }

        $data['jabatan'] = $this->JabatanModel->findAll();
        $title = "Data Jabatan";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/DataJabatan', $data)
            . view('TemplateAdmin/Footer');
    }

    public function editData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['jabatan'] = $this->JabatanModel->find($id);

        if (empty($data['jabatan'])) {
            session()->setFlashdata('errors', 'Data Jabatan tidak ditemukan!');

            return redirect()->to(base_url('datajabatan'));
        }

        $title = "Edit Data Jabatan";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/EditDataJabatan', $data)
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
                'nama_jabatan' => 'required',
                'gaji_pokok' => 'required|numeric',
                'tj_transport' => 'required|numeric',
                'uang_makan' => 'required|numeric',
            ];

            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    'nama_jabatan' => $this->request->getPost('nama_jabatan'),
                    'gaji_pokok' => $this->request->getPost('gaji_pokok'),
                    'tj_transport' => $this->request->getPost('tj_transport'),
                    'uang_makan' => $this->request->getPost('uang_makan'),
                ];

                $id = $this->request->getPost('id_jabatan');

                $this->JabatanModel->update($id, $data);

                session()->setFlashdata('success', 'Data Jabatan berhasil diperbarui!');

                return redirect()->to(base_url('datajabatan'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());

                return redirect()->to(base_url('editdatajabatan/' . $this->request->getPost('id_jabatan')));
            }
        }

        return redirect()->to(base_url('datajabatan'));
    }
    public function hapusData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        if (empty($id) || !is_numeric($id)) {
            session()->setFlashdata('errors', 'ID Jabatan tidak valid!');
        } else {
            if ($this->JabatanModel->delete($id)) {
                session()->setFlashdata('success', 'Data Jabatan berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus data Jabatan. Silakan coba lagi!');
            }
        }
        return redirect()->to(base_url('datajabatan'));
    }
}
