<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\AnggotaModel;

class Pengembalian extends BaseController
{
    protected $peminjamanModel;
    protected $bukuModel;
    protected $anggotaModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->bukuModel = new BukuModel();
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        // Mengambil Query page_peminjaman dari route untuk penomoran pagination
        $currentPage = $this->request->getVar('page_pengembalian') ? $this->request->getVar('page_pengembalian') : 1;
        $keyword = $this->request->getVar('keyword');
        $buku = $this->bukuModel->getIdWithJudul();
        $anggota = $this->anggotaModel->getIdWithJudul();

        // Pengecekan Kolom Search Keyword
        if ($keyword) {
            $pengembalian = $this->peminjamanModel->search($keyword);
        } else {
            $pengembalian = $this->peminjamanModel->getPengembalianActive();
        }
        $data = [
            'title' => "Pengembalian | Perpustakaan ARS",
            'pengembalian' => $pengembalian->paginate(5, 'pengembalian'),
            'pager' => $this->peminjamanModel->pager,
            'currentPage' => $currentPage,
            'buku' => $buku,
            'anggota' => $anggota
        ];

        return view('pengembalian/index', $data);
    }

    public function delete($id_pinjam)
    {
        $this->peminjamanModel->delete($id_pinjam);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/pengembalian');
    }


    public function update($id_pinjam)
    {
        // Convert Date to Time
        $tglKembaliCvtTime = strtotime($this->request->getVar('tgl_kembali'));
        $tglPengembalianCvtTime = strtotime($this->request->getVar('tgl_pengembalian'));

        // Get Different Time
        $timeDifferent = $tglPengembalianCvtTime - $tglKembaliCvtTime;

        $denda = $this->request->getVar('denda');

        // Convert Time to Days (86400 seconds == one day)
        $days = $timeDifferent / 86400;

        $total_denda = 0;

        // Kalo Hasilnya Days Minus Masuk Function Ini!
        if ($days > 0) {
            $total_denda = $denda * $days;
        }

        $data = [
            'tgl_pencatatan' => $this->request->getVar('tgl_pencatatan'),
            'id_anggota' => $this->request->getVar('id_anggota'),
            'id_buku' => $this->request->getVar('id_buku'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_kembali' => $this->request->getVar('tgl_kembali'),
            'tgl_pengembalian' => $this->request->getVar('tgl_pengembalian'),
            'denda' => $denda,
            'status_pengembalian' => 1,
            'status_peminjaman' => 1,
            'total_denda' => $total_denda,
        ];

        $this->peminjamanModel->update($id_pinjam, $data);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        return redirect()->to('/peminjaman');
    }
}
