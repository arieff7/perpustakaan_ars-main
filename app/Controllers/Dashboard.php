<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\PeminjamanModel;

class Dashboard extends BaseController
{
	protected $bukuModel;
	protected $anggotaModel;
	protected $peminjamanModel;

	public function __construct()
	{
		$this->bukuModel = new BukuModel();
		$this->anggotaModel = new AnggotaModel();
		$this->peminjamanModel = new PeminjamanModel();
	}

	public function index()
	{
		$data = [
			'title' => "Dashboard | Perpustakaan ARS",
			'buku' => $this->bukuModel->getCount(),
			'anggota' => $this->anggotaModel->getCount(),
			'peminjaman' => $this->peminjamanModel->getCount()
		];

		return view('dashboard/index', $data);
	}
}
