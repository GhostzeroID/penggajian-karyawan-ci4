<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\JabatanModel;
use App\Models\HakAksesModel;

class DataPegawai extends BaseController
{
    protected $PegawaiModel;
    protected $JabatanModel;
    protected $HakAksesModel;

    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
        $this->JabatanModel = new JabatanModel();
        $this->HakAksesModel = new HakAksesModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pegawai'] = $this->PegawaiModel->findAll();
        $title = "Data Pegawai";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/DataPegawai', $data)
            . view('TemplateAdmin/Footer');
    }

    public function tambahData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['jabatan'] = $this->JabatanModel->findAll();
        $title = "Tambah Data Pegawai";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/TambahDataPegawai', $data)
            . view('TemplateAdmin/Footer');
    }
    public function tambahDataPegawai()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pegawai'] = $this->PegawaiModel->findAll();
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nik' => 'required|is_unique[data_pegawai.nik]',
                'nama_pegawai' => 'required',
                'username' => 'required',
                'password' => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'telpon' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'tanggal_masuk' => 'required',
                'status' => 'required',
                'hak_akses' => 'required',
                'photo' => [
                    'rules' => 'uploaded[photo]|max_size[photo,1536]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Pilih Gambar Sampul terlebih dahulu',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ];

            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $filePhoto = $this->request->getFile('photo');

                $pathToPublicImg = FCPATH . 'img';

                if (!is_dir($pathToPublicImg)) {
                    mkdir($pathToPublicImg, 0777, true);
                }

                if ($filePhoto->move($pathToPublicImg)) {
                    $namaPhoto = $filePhoto->getName();
                } else {
                    session()->setFlashdata('errors', 'Gagal memindahkan file gambar. Silakan coba lagi!');
                    return redirect()->to(base_url('datapegawai'));
                }

                // Cek apakah 'nik' sudah ada di database
                $existingData = $this->PegawaiModel->where('nik', $this->request->getPost('nik'))->countAllResults();

                if ($existingData > 0) {
                    session()->setFlashdata('errors', 'NIK sudah ada di database. Gunakan NIK lain.');
                    return redirect()->to(base_url('datapegawai'));
                }

                $data = [
                    'nik' => $this->request->getPost('nik'),
                    'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'alamat' => $this->request->getPost('alamat'),
                    'telpon' => $this->request->getPost('telpon'),
                    'email' => $this->request->getPost('email'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
                    'status' => $this->request->getPost('status'),
                    'hak_akses' => $this->request->getPost('hak_akses'),
                    'photo' => $namaPhoto
                ];

                $this->PegawaiModel->insert($data);

                session()->setFlashdata('success', 'Data Pegawai berhasil ditambahkan!');

                return redirect()->to(base_url('datapegawai'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());

                return redirect()->to(base_url('datapegawai'));
            }
        }
    }

    public function editData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['pegawai'] = $this->PegawaiModel->find($id);
        $data['jabatan'] = $this->JabatanModel->findAll();

        if (empty($data['pegawai'])) {
            session()->setFlashdata('errors', 'Data Pegawai tidak ditemukan!');
            return redirect()->to(base_url('datapegawai'));
        }

        $title = "Edit Data Pegawai";

        return view('TemplateAdmin/Header', ['title' => $title])
            . view('TemplateAdmin/Sidebar')
            . view('Admin/EditDataPegawai', $data)
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
                'nik' => 'required',
                'nama_pegawai' => 'required',
                'username' => 'required',
                'password' => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'telpon' => 'required',
                'email' => 'required',
                'tanggal_masuk' => 'required',
                'status' => 'required',
                'hak_akses' => 'required',
            ];

            if (!empty($this->request->getFile('photo')->getName())) {
                $rules['photo'] = 'uploaded[photo]|max_size[photo,1536]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]';
            }

            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    'nik' => $this->request->getPost('nik'),
                    'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'alamat' => $this->request->getPost('alamat'),
                    'telpon' => $this->request->getPost('telpon'),
                    'email' => $this->request->getPost('email'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
                    'status' => $this->request->getPost('status'),
                    'hak_akses' => $this->request->getPost('hak_akses'),
                ];

                if (!empty($this->request->getFile('photo')->getName())) {
                    $filePhoto = $this->request->getFile('photo');
                    $pathToPublicImg = FCPATH . 'img';

                    if (!empty($data['photo']) && is_file($pathToPublicImg . '/' . $data['photo'])) {
                        unlink($pathToPublicImg . '/' . $data['photo']);
                    }

                    if ($filePhoto->move($pathToPublicImg)) {
                        $data['photo'] = $filePhoto->getName();
                    } else {
                        session()->setFlashdata('errors', 'Gagal memindahkan file gambar. Silakan coba lagi!');
                        return redirect()->to(base_url('datapegawai'));
                    }
                }

                $id = $this->request->getPost('id_pegawai');
                $this->PegawaiModel->update($id, $data);

                session()->setFlashdata('success', 'Data pegawai berhasil diperbarui!');

                return redirect()->to(base_url('datapegawai'));
            } else {
                session()->setFlashdata('errors', $validation->getErrors());

                return redirect()->to(base_url('datapegawai'));
            }
        }

        return redirect()->to(base_url('datapegawai'));
    }

    public function hapusData($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        if (empty($id) || !is_numeric($id)) {
            session()->setFlashdata('errors', 'ID Pegawai tidak valid!');
        } else {
            $pegawai = $this->PegawaiModel->find($id);
            $namaPhoto = $pegawai['photo'];

            if ($this->PegawaiModel->delete($id)) {
                $pathToPublicImg = FCPATH . 'img/' . $namaPhoto;
                if (file_exists($pathToPublicImg)) {
                    unlink($pathToPublicImg);
                }

                session()->setFlashdata('success', 'Data Pegawai berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus data Pegawai. Silakan coba lagi!');
            }
        }

        return redirect()->to(base_url('datapegawai'));
    }
}
