<?php

namespace App\Models;
use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = 'pinjam_buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'buku_id', 'tanggal_mulai', 'tanggal_selesai', 'status'];

    public function getPinjamWithBukuAndUsers($id = null)
    {
        $this->select('
            pinjam_buku.id as pinjam_id, 
            pinjam_buku.*, 
            buku.*, 
            users.nama as nama_user, 
            users.username
        ')
        ->join('buku', 'buku.id = pinjam_buku.buku_id')
        ->join('users', 'users.id = pinjam_buku.user_id');

        if ($id !== null) {
            return $this->where('pinjam_buku.id', $id)->first(); 
        }

        return $this->findAll(); 
    }

}
