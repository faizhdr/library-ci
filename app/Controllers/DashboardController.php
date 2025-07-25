<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\UserModel;
use App\Models\PinjamModel;
use App\Models\KategoriModel;


class DashboardController extends BaseController
{
    protected $pinjamModel;
    protected $bukuModel;
    protected $userModel;
    protected $kategoriModel;

     public function __construct()
    {
        $this->pinjamModel = new PinjamModel();
        $this->bukuModel = new BukuModel();
        $this->userModel = new UserModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index_admin()
    {

        $data['total_buku'] = $this->bukuModel->countAll();
        $data['total_user'] = $this->userModel->where('role', 'user')->countAllResults();
        $data['total_pinjam'] = $this->pinjamModel->whereNotIn('status', ['process'])->countAllResults();
        $data['total_kategori'] = $this->kategoriModel->countAll();

        $data['pinjam'] = $this->pinjamModel->where('status', 'process')->getPinjamWithBukuAndUsers();
        return view('dashboard/index_admin', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');

        $this->pinjamModel->update($id, [
            'status' => $status
        ]);
        
        session()->setFlashdata('success', "Status peminjaman berhasil diubah menjadi <b>$status</b>.");
        return redirect()->to('/dashboard_admin');
    }
}