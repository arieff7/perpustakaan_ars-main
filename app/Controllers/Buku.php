<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        // Mengambil Query page_buku dari route untuk penomoran pagination
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $keyword = $this->request->getVar('keyword');

        // Pengecekan Kolom Search Keyword
        if ($keyword) {
            $buku = $this->bukuModel->search($keyword);
        } else {
            $buku = $this->bukuModel;
        }
        $data = [
            'title' => "Buku | Perpustakaan ARS",
            'buku' => $buku->paginate(5, 'buku'),
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage
        ];

        return view('buku/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Tambah Buku | Perpustakaan ARS",
            'validation' => \Config\Services::validation()
        ];

        return view('buku/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'thn_terbit' => 'required',
            'penerbit' => 'required',
            'isbn' => 'required',
            'jumlah_buku' => 'required',
            'gambar' => 'required',
        ])) {
            return redirect()->to('/buku/create')->withInput();
        }

        $this->bukuModel->save([
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang' => $this->request->getVar('pengarang'),
            'thn_terbit' => $this->request->getVar('thn_terbit'),
            'penerbit' => $this->request->getVar('penerbit'),
            'isbn' => $this->request->getVar('isbn'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'gambar' => $this->request->getVar('gambar'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/buku');
    }

    public function delete($id_buku)
    {
        $this->bukuModel->delete($id_buku);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/buku');
    }

    public function edit($id_buku)
    {
        $data = [
            'title' => 'Tambah Buku | Perpustakaan ARS',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($id_buku)
        ];

        return view('buku/edit', $data);
    }

    public function update($id_buku)
    {
        if (!$this->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'thn_terbit' => 'required',
            'penerbit' => 'required',
            'isbn' => 'required',
            'jumlah_buku' => 'required',
            'gambar' => 'required',
        ])) {
            return redirect()->to('/buku/edit/' . $id_buku)->withInput();
        }

        $data = [
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang' => $this->request->getVar('pengarang'),
            'thn_terbit' => $this->request->getVar('thn_terbit'),
            'penerbit' => $this->request->getVar('penerbit'),
            'isbn' => $this->request->getVar('isbn'),
            'jumlah_buku' => $this->request->getVar('jumlah_buku'),
            'gambar' => $this->request->getVar('gambar'),
        ];

        $this->bukuModel->update($id_buku, $data);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/buku');
    }
}
