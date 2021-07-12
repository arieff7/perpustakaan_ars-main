<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        // Mengambil Query page_anggota dari route untuk penomoran pagination
        $currentPage = $this->request->getVar('page_anggota') ? $this->request->getVar('page_anggota') : 1;
        $keyword = $this->request->getVar('keyword');

        // Pengecekan Kolom Search Keyword
        if ($keyword) {
            $anggota = $this->anggotaModel->search($keyword);
        } else {
            $anggota = $this->anggotaModel;
        }

        $data = [
            'title' => "Anggota | Perpustakaan ARS",
            'anggota' => $anggota->paginate(5, 'anggota'),
            'pager' => $this->anggotaModel->pager,
            'currentPage' => $currentPage
        ];

        return view('anggota/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Tambah Anggota | Perpustakaan ARS",
            'validation' => \Config\Services::validation()
        ];

        return view('anggota/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_anggota' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ])) {
            return redirect()->to('/anggota/create')->withInput();
        }

        $this->anggotaModel->save([
            'nama_anggota' => $this->request->getVar('nama_anggota'),
            'gender' => $this->request->getVar('gender'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/anggota');
    }

    public function delete($id_anggota)
    {
        $this->anggotaModel->delete($id_anggota);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/anggota');
    }

    public function edit($id_anggota)
    {
        $data = [
            'title' => 'Tambah Buku | Perpustakaan ARS',
            'validation' => \Config\Services::validation(),
            'anggota' => $this->anggotaModel->getAnggota($id_anggota)
        ];

        return view('anggota/edit', $data);
    }

    public function update($id_anggota)
    {
        if (!$this->validate([
            'nama_anggota' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ])) {
            return redirect()->to('/anggota/edit/' . $id_anggota)->withInput();
        }

        $data = [
            'nama_anggota' => $this->request->getVar('nama_anggota'),
            'gender' => $this->request->getVar('gender'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
        ];

        $this->anggotaModel->update($id_anggota, $data);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/anggota');
    }
}
