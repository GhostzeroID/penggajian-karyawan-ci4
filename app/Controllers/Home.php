<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Home extends BaseController
{
    protected $PegawaiModel;

    public function __construct()
    {

        $this->PegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        return view('welcome_message');
    }

    public function login()
    {
        $data['pegawai'] = $this->PegawaiModel->findAll();

        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'username' => 'required',
                'password' => 'required'
            ];

            $validationMessages = [
                'username' => [
                    'required' => 'Username harus diisi.'
                ],
                'password' => [
                    'required' => 'Password harus diisi.'
                ]
            ];

            if ($this->validate($validationRules, $validationMessages)) {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $user = $this->PegawaiModel->cek_login($username, $password);
        
                if ($user) {
                    session()->set('logged_in', true);
                    session()->set('hak_akses', $user['hak_akses']);
                    session()->set('username', $username);
                    $nik = $this->PegawaiModel->getNIKByUsername($username);
                    session()->set('nik', $nik);
                    if ($user['hak_akses'] == 1) {
                        return redirect()->to(base_url('admin'));
                    } elseif ($user['hak_akses'] == 2) {
                        return redirect()->to(base_url('pegawai'));
                    }
                } else {
                    $data['error'] = 'Username atau password salah. Silakan coba lagi.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('welcome_message', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login1'));
    }
}
