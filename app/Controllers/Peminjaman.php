<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\AnggotaModel;
use CodeIgniter\I18n\Time;

class Peminjaman extends BaseController
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
        $currentPage = $this->request->getVar('page_peminjaman') ? $this->request->getVar('page_peminjaman') : 1;
        $keyword = $this->request->getVar('keyword');
        $buku = $this->bukuModel->getIdWithJudul();
        $anggota = $this->anggotaModel->getIdWithJudul();

        // Pengecekan Kolom Search Keyword
        if ($keyword) {
            $peminjaman = $this->peminjamanModel->search($keyword);
        } else {
            $peminjaman = $this->peminjamanModel->getPeminjamanActive();
        }
        $data = [
            'title' => "Peminjaman | Perpustakaan ARS",
            'peminjaman' => $peminjaman->paginate(5, 'peminjaman'),
            'pager' => $this->peminjamanModel->pager,
            'currentPage' => $currentPage,
            'buku' => $buku,
            'anggota' => $anggota
        ];

        return view('peminjaman/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Tambah Peminjaman | Perpustakaan ARS",
            'validation' => \Config\Services::validation(),
            'anggota' => $this->anggotaModel->getIdWithJudul(),
            'buku' => $this->bukuModel->getIdWithJudul(),
        ];

        return view('peminjaman/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'denda' => 'required',
        ])) {
            return redirect()->to('/peminjaman/create')->withInput();
        }

        $this->peminjamanModel->save([
            'tgl_pencatatan' => Time::now(),
            'id_anggota' => $this->request->getVar('id_anggota'),
            'id_buku' => $this->request->getVar('id_buku'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_kembali' => $this->request->getVar('tgl_kembali'),
            'denda' => $this->request->getVar('denda'),
            'status_pengembalian' => 0,
            'status_peminjaman' => 1,
            'total_denda' => 0,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/peminjaman');
    }
}
