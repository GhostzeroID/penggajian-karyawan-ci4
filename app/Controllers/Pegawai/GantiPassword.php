<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class GantiPassword extends BaseController
{
    protected $PegawaiModel;

    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login1'));
        }
        $data['title'] = "Ganti Password";

        echo view('TemplatePegawai/Header', $data);
        echo view('TemplatePegawai/Sidebar');
        echo view('Pegawai/GantiPassword', $data);
        echo view('TemplatePegawai/Footer');
    }


    public function gantiPassword()
    {
        $data['pegawai'] = $this->PegawaiModel->findAll();

        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'old_password' => 'required',
                'new_password' => 'required'
            ];

            $validationMessages = [
                'old_password' => [
                    'required' => 'Password lama harus diisi.'
                ],
                'new_password' => [
                    'required' => 'Password baru harus diisi.'
                ]
            ];

            if ($this->validate($validationRules, $validationMessages)) {
                $username = session()->get('username');
                $old_password = $this->request->getPost('old_password');
                $new_password = $this->request->getPost('new_password');

                $user = $this->PegawaiModel->getByUsernameAndPassword($username, $old_password);

                if ($user) {
                    $this->PegawaiModel->gantiPassword($username, $new_password);

                    session()->set('logged_in', true);
                    session()->set('hak_akses', $user['hak_akses']);
                    session()->set('username', $username);

                    if ($user['hak_akses'] == 1) {
                        return redirect()->to(base_url('admin'));
                    } elseif ($user['hak_akses'] == 2) {
                        return redirect()->to(base_url('pegawai'));
                    }
                } else {
                    $data['error'] = 'Password lama tidak cocok. Silakan coba lagi.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('welcome_message', $data);
    }
}
