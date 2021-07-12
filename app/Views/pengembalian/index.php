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
                        <h5>Daftar Pengembalian</h5>
                        <span class="d-block m-t-5">Lihat status peminjaman yang sudah dikembalikan</span>
                    </div>
                </div>

            </div>
            <div class="card-body table-border-style">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label for="keyword" class="col-sm-1 col-form-label font-bold">Pencarian</label>
                        <div class="col">
                            <div class="input-group">
                                <input type="date" class="form-control" id="keyword" name="keyword" min="1970" value="<?= old('keyword'); ?>" />
                                <button type="submit" class="btn btn-dark btn-lg"><i class="mr-2" data-feather="search"></i>Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Judul Buku</th>
                                <th>Nama Peminjam</th>
                                <th>Total Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1 + (5 * $currentPage - 5); ?>
                                <?php foreach ($pengembalian as $item) : ?>
                                    <?php if ($item['status_pengembalian'] == 1 && $item['status_peminjaman'] == 1) : ?>
                                        <td><?= $i++ ?></td>
                                        <td class="text-truncate"><?= $item['tgl_pinjam'] ?></td>
                                        <td class="text-truncate"><?= $item['tgl_kembali'] ?></td>
                                        <td class="text-truncate"><?= $item['tgl_pengembalian'] ?></td>
                                        <td class="text-truncate">
                                            <?php foreach ($buku as $itemBuku => $value) : ?>
                                                <?php if ($value->id_buku == $item['id_buku']) : ?>
                                                    <?= $value->judul_buku ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td class="text-truncate">
                                            <?php foreach ($anggota as $itemAnggota => $value) : ?>
                                                <?php if ($value->id_anggota == $item['id_anggota']) : ?>
                                                    <?= $value->nama_anggota ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td class="text-truncate">Rp. <?= $item['total_denda'] ?>,-</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="/pengembalian/<?= $item['id_pinjam']; ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-sm btn-icon btn-secondary"><i data-feather="trash-2"></i></button>
                                                </form>

                                            </div>
                                        </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="mx-4">

            <div class="d-flex justify-content-center mx-4 my-3">
                <?= $pager->links('pengembalian', 'custom_pagination'); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>