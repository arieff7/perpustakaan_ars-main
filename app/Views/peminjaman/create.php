<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col">
                        <h5>Tambah Peminjaman</h5>
                        <span class="d-block m-t-5">Tambah data peminjaman baru ke dalam database</span>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <form action="/peminjaman/save" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label" for="id_anggota">Nama Anggota</label>
                        <select class="form-select <?= ($validation->hasError('id_anggota')) ? 'is-invalid' : ''; ?>" id="id_anggota" name="id_anggota">
                            <option value="" selected>Pilih Nama Anggota...</option>
                            <?php foreach ($anggota as $itemAnggota => $value) : ?>
                                <option value="<?= $value->id_anggota ?>"><?= $value->nama_anggota ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_anggota'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="id_buku">Nama Buku</label>
                        <select class="form-select <?= ($validation->hasError('id_buku')) ? 'is-invalid' : ''; ?>" id="id_buku" name="id_buku">
                            <option value="" selected>Pilih Nama Buku...</option>
                            <?php foreach ($buku as $itemBuku => $value) : ?>
                                <option value="<?= $value->id_buku ?>"><?= $value->judul_buku ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_buku'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_pinjam')) ? 'is-invalid' : ''; ?>" id="tgl_pinjam" name="tgl_pinjam" placeholder="Masukkan tanggal pinjam" value="<?= old('tgl_pinjam'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_pinjam'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="tgl_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_kembali')) ? 'is-invalid' : ''; ?>" id="tgl_kembali" name="tgl_kembali" placeholder="Masukkan tanggal kembali" value="<?= old('tgl_kembali'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_kembali'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="denda">Denda (Per-Hari)</label>
                        <input type="number" class="form-control <?= ($validation->hasError('denda')) ? 'is-invalid' : ''; ?>" id="denda" name="denda" placeholder="Masukkan denda keterlambatan perhari" value="<?= old('denda'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('denda'); ?>
                        </div>
                    </div>

                    <hr>
                    <div class="col d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="mr-2" data-feather="save"></i>Simpan Anggota</button>
                        <a href="/peminjaman" class="btn btn-white btn-lg">Kembali</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>