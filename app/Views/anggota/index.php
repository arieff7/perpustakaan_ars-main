<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col">
                        <h5>Daftar Anggota</h5>
                        <span class="d-block m-t-5">Lihat, Edit, Tambah, dan Hapus Anggota yang terdaftar</span>
                    </div>
                    <div>
                        <a href="anggota/create">
                            <button type="button" class="btn  btn-dark btn-lg"><i class="mr-2" data-feather="plus-circle"></i>Tambah Anggota</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body table-border-style">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label for="keyword" class="col-sm-1 col-form-label font-bold">Pencarian</label>
                        <div class="col">
                            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari anggota..." />
                            <input type="submit" class="sr-only" tabindex="-1" hidden />
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1 + (5 * $currentPage - 5); ?>
                                <?php foreach ($anggota as $item) : ?>
                                    <td><?= $i++ ?></td>
                                    <td class="text-truncate"><?= $item['nama_anggota'] ?></td>
                                    <td class="text-truncate"><?= $item['gender'] ?></td>
                                    <td class="text-truncate"><?= $item['no_telp'] ?></td>
                                    <td class="text-truncate"><?= $item['alamat'] ?></td>
                                    <td class="text-truncate"><?= $item['email'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="/anggota/edit/<?= $item['id_anggota']; ?>" method="GET" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-icon btn-dark mr-3"><i data-feather="edit-2"></i></button>
                                            </form>

                                            <form action="/anggota/<?= $item['id_anggota']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-sm btn-icon btn-secondary"><i data-feather="trash-2"></i></button>
                                            </form>

                                        </div>
                                    </td>
                            </tr>
                        <?php endforeach; ?>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="mx-4">

            <div class="d-flex justify-content-center mx-4 my-3">
                <?= $pager->links('anggota', 'custom_pagination'); ?>
            </div>

            <!-- Pagination -->
            <!-- <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#!" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#!">Next</a>
                    </li>
                </ul>
            </nav> -->
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>