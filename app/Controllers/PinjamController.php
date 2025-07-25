<?php
namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\UserModel;
use App\Models\PinjamModel;

class PinjamController extends BaseController
{
    protected $pinjamModel;
    protected $bukuModel;
    protected $userModel;

     public function __construct()
    {
        $this->pinjamModel = new PinjamModel();
        $this->bukuModel = new BukuModel();
        $this->userModel = new UserModel();
    }

    public function listBuku()
    {
        $data['buku'] = $this->bukuModel->getBukuWithKategori();

        return view('pinjam/list_buku', $data);
    }

    public function listPinjamPerUser($id = null)
    {
        $userId = session()->get('user_id');
        $data['pinjam'] = $this->pinjamModel->where('pinjam_buku.user_id', $userId)->getPinjamWithBukuAndUsers();

        return view('pinjam/list_pinjam_per_user', $data);
    }

    public function index()
    {
        $data['pinjam'] = $this->pinjamModel->getPinjamWithBukuAndUsers();

        return view('pinjam/index', $data);
    }

    public function create($buku_id)
    {
        $data = [
            'pinjam' => $this->bukuModel->getBukuWithKategori($buku_id)
        ];
        return view('pinjam/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'tanggal_mulai' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal mulai wajib diisi',
                    'valid_date' => 'Format tanggal tidak valid'
                ]
            ],
            'tanggal_selesai' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal selesai wajib diisi',
                    'valid_date' => 'Format tanggal tidak valid'
                ]
            ]
        ];

        // Jalankan validasi
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'user_id' => session()->get('user_id'), // otomatis dari session login
            'buku_id' => $this->request->getPost('buku_id'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'status' => 'process', // default
        ];

        $this->pinjamModel->save($data);
        
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/list_pinjam_per_user');
    }


    
}