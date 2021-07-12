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
                        <h5>Daftar Buku</h5>
                        <span class="d-block m-t-5">Lihat, Edit, Tambah, dan Hapus Buku yang tersedia</span>
                    </div>
                    <a href="buku/create">
                        <button type="button" class="btn  btn-dark btn-lg"><i class="mr-2" data-feather="plus-circle"></i>Tambah Buku</button>
                    </a>
                </div>

            </div>
            <div class="card-body table-border-style">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label for="keyword" class="col-sm-1 col-form-label font-bold">Pencarian</label>
                        <div class="col">
                            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari buku..." />
                            <input type="submit" class="sr-only" tabindex="-1" hidden />
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>ISBN</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1 + (5 * $currentPage - 5); ?>
                                <?php foreach ($buku as $item) : ?>
                                    <td><?= $i++ ?></td>
                                    <td class="text-truncate">
                                        <a href="#!" data-toggle="modal" data-target="#data<?= $item['id_buku']; ?>" data-whatever="<?= $item['gambar']; ?>"><?= $item['judul_buku'] ?></a>
                                    </td>
                                    <td class="text-truncate"><?= $item['pengarang'] ?></td>
                                    <td class="text-truncate"><?= $item['penerbit'] ?></td>
                                    <td class="text-truncate"><?= $item['isbn'] ?></td>
                                    <td class="text-truncate"><?= $item['thn_terbit'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="/buku/edit/<?= $item['id_buku']; ?>" method="GET" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-icon btn-dark mr-3"><i data-feather="edit-2"></i></button>
                                            </form>

                                            <form action="/buku/<?= $item['id_buku']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-sm btn-icon btn-secondary"><i data-feather="trash-2"></i></button>
                                            </form>
                                        </div>
                                    </td>
                            </tr>

                            <!-- Modal  -->
                            <div class="modal fade" id="data<?= $item['id_buku']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="link">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-truncate" id="updatePeminjamanLabel"><?= $item['judul_buku']; ?></h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="card-img" src="<?= $item['gambar']; ?>" style="max-height: 75vh; max-width: 100%; object-fit: contain;" , alt="Banner">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="mx-4">

            <div class="d-flex justify-content-center mx-4 my-3">
                <?= $pager->links('buku', 'custom_pagination'); ?>
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