<?php

namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cover', 'judul', 'kategori_id', 'penulis', 'penerbit', 'tahun_terbit', 'deskripsi', 'created_at', 'updated_at'];

    public function getBukuWithKategori($id = null)
    {
        $this->select('buku.*, kategori.nama_kategori')
             ->join('kategori', 'kategori.id = buku.kategori_id');

        if ($id !== null) {
            return $this->where('buku.id', $id)->first(); // Ambil 1 buku
        }

        return $this->findAll(); // Ambil semua buku
    }
}
