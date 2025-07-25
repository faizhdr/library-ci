<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

     public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['user'] = $this->userModel->findAll();

        return view('user/index', $data);
    }


    public function show($id = null)
    {
        //
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $validationRules = [
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Judul buku wajib diisi.',
                    'min_length' => 'Judul minimal 3 karakter.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'username wajib diisi.',
                    'is_unique' => 'username sudah ada.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]', 
                'errors' => [
                    'required' => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun terbit wajib diisi.',
                ]
            ],
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Simpan ke database jika valid
        $this->userModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/user');
    }


    public function edit($id = null)
    {
        $data['user'] = $this->userModel->find($id);
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Judul buku wajib diisi.',
                    'min_length' => 'Judul minimal 3 karakter.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username,id,' . $id . ']', 
                // pastikan unique kecuali untuk id ini (lihat catatan di bawah)
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'is_unique' => 'Username sudah ada.'
                ]
            ],
            'password' => [
                'rules' => 'permit_empty|min_length[6]', 
                'errors' => [
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun terbit wajib diisi.',
                ]
            ],
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Ambil data lama
        $oldUser = $this->userModel->find($id);

        // Jika password baru diisi, hash password baru, kalau kosong pakai password lama
        $password = $this->request->getVar('password');
        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $password = $oldUser['password'];
        }

        // Simpan ke database jika valid
        $this->userModel->update($id, [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'role' => $this->request->getVar('role'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/user');
    }
}
