<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = "anggota";
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['nama_anggota', 'gender', 'no_telp', 'alamat', 'email'];

    public function getAnggota($id_anggota = "0")
    {
        if ($id_anggota == "0") {
            return $this->findAll();
        }

        return $this->where(['id_anggota' => $id_anggota])->first();
    }

    public function search($keyword)
    {
        return $this->table('anggota')->like('nama_anggota', $keyword)->orLike('alamat', $keyword);
    }

    public function getIdWithJudul()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('anggota');
        $builder->select('id_anggota');
        $builder->select('nama_anggota');
        $query = $builder->get()->getResult();
        return $query;
    }

    public function getCount()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('anggota');
        $builder->select('id_anggota');
        $builder->countAll();
        $query = $builder->get()->getResult();
        return $query;
    }
}
