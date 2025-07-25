<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

     public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();

        return view('kategori/index', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store()
    {
        $validationRules = [
            'nama_kategori' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Kategori wajib diisi.',
                    'min_length' => 'Nama Kategori minimal 3 karakter.'
                ]
            ],
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Simpan ke database jika valid
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/kategori');
    }


    public function edit($id = null)
    {
        $data['kategori'] = $this->kategoriModel->find($id);
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'nama_kategori' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Kategori wajib diisi.',
                    'min_length' => 'Nama Kategori minimal 3 karakter.'
                ]
            ],
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Simpan ke database jika valid
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $bukuModel = new BukuModel();
        $buku = $bukuModel->where('kategori_id', $id)->first();

        if ($buku) {
            session()->setFlashdata('error', 'Tidak bisa menghapus kategori karena sedang digunakan pada data buku.');
            return redirect()->to('/kategori');
        }
        $this->kategoriModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/kategori');
    }
}
