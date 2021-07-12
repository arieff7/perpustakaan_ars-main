<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = "buku";
    protected $primaryKey = 'id_buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul_buku', 'pengarang', 'thn_terbit', 'penerbit', 'isbn', 'jumlah_buku', 'lokasi', 'gambar', 'status_buku'];

    public function getBuku($id_buku = "0")
    {
        if ($id_buku == "0") {
            return $this->findAll();
        }

        return $this->where(['id_buku' => $id_buku])->first();
    }

    public function search($keyword)
    {
        return $this->table('buku')->like('judul_buku', $keyword)->orLike('pengarang', $keyword);
    }

    public function getIdWithJudul()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $builder->select('id_buku');
        $builder->select('judul_buku');
        $query = $builder->get()->getResult();
        return $query;
    }

    public function getCount()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $builder->select('id_buku');
        $builder->countAll();
        $query = $builder->get()->getResult();
        return $query;
    }
}
