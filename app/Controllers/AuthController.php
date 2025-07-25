<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{

    public function login()
    {
        return view('auth/login');
    }

    public function proses()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if (empty($username) && empty($password)) {
            $session->setFlashdata('error', 'Username dan Password wajib diisi.');
            return redirect()->back()->withInput();
        }

        if (empty($username)) {
            $session->setFlashdata('error', 'Username wajib diisi.');
            return redirect()->back()->withInput();
        }

        if (empty($password)) {
            $session->setFlashdata('error', 'Password wajib diisi.');
            return redirect()->back()->withInput();
        }

        // ✅ Cari user di database
        $user = $model->getUserByUsername($username);

        if (!$user) {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->back()->withInput();
        }

        // ✅ Verifikasi password
        if (!password_verify($password, $user['password'])) {
            $session->setFlashdata('error', 'Password salah.');
            return redirect()->back()->withInput();
        }

        $sessionData = [
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'nama'       => $user['nama'],
            'role'       => $user['role'],
            'isLoggedIn' => TRUE
        ];
        $session->set($sessionData);

        // ✅ Arahkan berdasarkan role
        if ($user['role'] == 'admin') {
            return redirect()->to('/dashboard_admin');
        } else {
            return redirect()->to('/list_buku');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
