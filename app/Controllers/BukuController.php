<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\KategoriModel;

class BukuController extends BaseController
{
    protected $bukuModel;

     public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->getBukuWithKategori();

        return view('buku/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'buku' => $this->bukuModel->getBukuWithKategori($id),
        ];
        
        return view('buku/show', $data);
    }

    public function create()
    {
        $kategoriModel = new KategoriModel();
        $data = [
            'kategori' => $kategoriModel->findAll() // ambil semua kategori
        ];
        return view('buku/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'cover' => [
                'rules' => 'is_image[cover]|max_size[cover,2048]',
                'errors' => [
                    'is_image' => 'File cover harus berupa gambar (jpg/png).',
                    'max_size' => 'Ukuran cover maksimal 2 MB.'
                ]
            ],
            'judul' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Judul buku wajib diisi.',
                    'min_length' => 'Judul minimal 3 karakter.'
                ]
            ],
            'kategori_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori wajib diisi.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penulis wajib diisi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Penerbit wajib diisi.'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|exact_length[4]',
                'errors' => [
                    'required' => 'Tahun terbit wajib diisi.',
                    'numeric' => 'Tahun terbit harus berupa angka.',
                    'exact_length' => 'Tahun terbit harus 4 digit (contoh: 2024).'
                ]
            ],
            'deskripsi' => [
                'rules' => 'permit_empty'
            ]
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $fileCover = $this->request->getFile('cover');
        $namaCover = $fileCover->isValid() && !$fileCover->hasMoved()
            ? $fileCover->getRandomName()
            : 'no_cover.png';

        // Simpan ke database jika valid
        $this->bukuModel->save([
            'cover' => $namaCover,
            'judul' => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/buku');
    }


    public function edit($id = null)
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'buku'     => $this->bukuModel->getBukuWithKategori($id),
            'kategori' => $kategoriModel->findAll()
        ];
        
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'cover' => [
                'rules' => 'if_exist|is_image[cover]|max_size[cover,2048]',
                'errors' => [
                    'is_image' => 'File cover harus berupa gambar.',
                    'max_size' => 'Ukuran cover maksimal 2 MB.'
                ]
            ],
            'judul' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Judul buku wajib diisi.',
                    'min_length' => 'Judul minimal 3 karakter.'
                ]
            ],
            'kategori_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori wajib diisi.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penulis wajib diisi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Penerbit wajib diisi.'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|exact_length[4]',
                'errors' => [
                    'required' => 'Tahun terbit wajib diisi.',
                    'numeric' => 'Tahun terbit harus berupa angka.',
                    'exact_length' => 'Tahun terbit harus 4 digit (contoh: 2024).'
                ]
            ],
            'deskripsi' => [
                'rules' => 'permit_empty'
            ]
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $coverName = $this->request->getPost('old_cover'); // cover lama

        $fileCover = $this->request->getFile('cover');
        if ($fileCover && $fileCover->isValid() && !$fileCover->hasMoved()) {
            // Hapus cover lama
            if ($coverName && file_exists('uploads/covers/' . $coverName)) {
                unlink('uploads/covers/' . $coverName);
            }
            // Upload cover baru
            $coverName = $fileCover->getRandomName();
            $fileCover->move('uploads/covers', $coverName);
        }

        // Simpan ke database jika valid
        $this->bukuModel->update($id, [
            'cover' => $coverName,
            'judul' => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);

        if ($buku) {
            // Hapus cover dari folder jika ada
            if (!empty($buku['cover']) && $buku['cover'] !== 'no_cover.png' && file_exists('uploads/covers/' . $buku['cover'])) {
                unlink('uploads/covers/' . $buku['cover']);
            }

            // Hapus data buku dari database
            $this->bukuModel->delete($id);

            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data buku tidak ditemukan.');
        }

        return redirect()->to('/buku');
    }
}
