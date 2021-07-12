<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = "peminjaman";
    protected $primaryKey = 'id_pinjam';
    protected $allowedFields = ['tgl_pencatatan', 'id_anggota', 'id_buku', 'tgl_pinjam', 'tgl_kembali', 'denda', 'tgl_pengembalian', 'total_denda', 'status_pengembalian', 'status_peminjaman'];

    public function getPeminjaman($id_pinjam = "0")
    {
        if ($id_pinjam == "0") {

            // Query Builder 1 get Value JUDUL BUKU & NAMA ANGGOTA (Tested Work!)
            // RESULT QUERY
            // SELECT `buku`.`judul_buku`, `anggota`.`nama_anggota`, `peminjaman`.* FROM `peminjaman` LEFT JOIN `buku` ON `buku`.`id_buku` = `peminjaman`.`id_buku` LEFT JOIN `anggota` ON `anggota`.`id_anggota` = `peminjaman`.`id_anggota`
            // $this->join('buku', 'buku.id_buku = peminjaman.id_buku', 'LEFT');
            // $this->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'LEFT');
            // $this->select('buku.judul_buku');
            // $this->select('anggota.nama_anggota');
            // $this->select('peminjaman.*');
            // $result = $this->findAll();

            // // ECHO RESULT QUERY
            // echo $this->db->getLastQuery();

            // return $result;

            // Query Builder 2 get Value JUDUL BUKU & NAMA ANGGOTA
            // RESULT QUERY
            $db      = \Config\Database::connect();
            $builder = $db->table('peminjaman');
            $builder->select('*');
            $builder->join('buku', 'buku.id_buku = peminjaman.id_buku');
            $builder->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
            $query = $builder->get();


            return $query;


            // Built In Method FindAll
            // return $this->findAll();
        }

        return $this->where(['id_pinjam' => $id_pinjam])->first();
    }

    public function search($keyword)
    {
        return $this->table('peminjaman')->like('tgl_pinjam', $keyword)->orLike('tgl_kembali', $keyword);
    }

    public function getCount()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('peminjaman');
        $builder->select('id_pinjam');
        $builder->countAll();
        $query = $builder->get()->getResult();
        return $query;
    }

    public function getPeminjamanActive()
    {
        return $this->where(['status_peminjaman' => 1, "status_pengembalian" => 0]);
    }

    public function getPengembalianActive()
    {
        return $this->where(["status_peminjaman" => 1, 'status_pengembalian' => 1,]);
    }
}
