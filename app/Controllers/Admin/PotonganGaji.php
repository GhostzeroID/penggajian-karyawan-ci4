<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PotonganGajiModel;
use App\Models\JabatanModel;

class PotonganGaji extends BaseController
{
    protected $PotonganGajiModel;
    protected $JabatanModel;
    public function __construct()
    {
        $this->PotonganGajiModel = new PotonganGajiModel();
        $this->JabatanModel = new JabatanModel();
    }
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $title = "Potongan Gaji";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/PotonganGaji', $data)
            . view('TemplateAdmin/Footer');
    }
    public function tambahData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pot_gaji'] = $this->PotonganGajiModel->findAll();
        $data['jabatan'] = $this->JabatanModel->findAll();
        $title = "Tambah Data Potongan Gaji";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/TambahPotonganGaji', $data)
            . view('TemplateAdmin/Footer');
    }
    public function tambahDataPotongan()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama_jabatan' => 'required',
            ];

            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $jabatan = $this->request->getPost('nama_jabatan');
                $gajiPokok = $this->JabatanModel->getGajiPokokByJabatan($jabatan);
                $persentasePotonganBPJS = 5;
                $persentasePotonganPPH = 1 / 28;

                $potonganBPJS = ($persentasePotonganBPJS / 100) * $gajiPokok;
                $potonganPPH = $gajiPokok * $persentasePotonganPPH;

                $data = [
                    'potongan' => $this->request->getPost('nama_jabatan'),
                    'jml_potongan_bpjsk' => $potonganBPJS,
                    'jml_potongan_bpjskk' => $potonganBPJS,
                    'jml_potongan_pph' => $potonganPPH,
                ];

                $this->PotonganGajiModel->insert($data);

                session()->setFlashdata('success', 'Data Potongan berhasil ditambahkan!');
                return redirect()->to(base_url('potongangaji'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to(base_url('potongangaji'));
            }
        }

        $data['jabatan'] = $this->JabatanModel->findAll();
        $title = "Tambah Data Potongan Gaji";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/TambahPotonganGaji', $data)
            . view('TemplateAdmin/Footer');
    }

    public function editData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pot_gaji'] = $this->PotonganGajiModel->find($id);

        if (empty($data['pot_gaji'])) {
            session()->setFlashdata('errors', 'Data Potongan tidak ditemukan!');

            return redirect()->to(base_url('potongangaji'));
        }

        $title = "Edit Data Potongan";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/EditDataPotongan', $data)
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
                'potongan' => 'required',
                'jml_potongan' => 'required|numeric'
            ];

            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    'potongan' => $this->request->getPost('potongan'),
                    'jml_potongan' => $this->request->getPost('jml_potongan')
                ];

                $id = $this->request->getPost('id');

                $this->PotonganGajiModel->update($id, $data);

                session()->setFlashdata('success', 'Data Potongan berhasil diperbarui!');
                return redirect()->to(base_url('potongangaji'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to(base_url('editdatapotongan/' . $this->request->getPost('id')));
            }
        }

        return redirect()->to(base_url('potongangaji'));
    }
    public function hapusData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        if (empty($id) || !is_numeric($id)) {
            session()->setFlashdata('errors', 'ID Potongan Gaji tidak valid!');
        } else {
            if ($this->PotonganGajiModel->delete($id)) {
                session()->setFlashdata('success', 'Data Potongan Gaji berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus data Potongan Gaji. Silakan coba lagi!');
            }
        }
        return redirect()->to(base_url('potongangaji'));
    }
}
