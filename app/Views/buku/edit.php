<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col">
                        <h5>Edit Buku</h5>
                        <span class="d-block m-t-5">Edit data buku yang tersedia dalam database</span>
                    </div>
                    <!-- <button type="button" class="btn  btn-primary btn-lg"><i class="mr-2" data-feather="save"></i>Simpan Buku</button> -->
                </div>

            </div>
            <div class="card-body">
                <form action="/buku/update/<?= $buku['id_buku']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label" for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" placeholder="Masukkan judul buku" autofocus value="<?= (old('judul_buku') ? old('judul_buku') : $buku['judul_buku']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_buku'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pengarang">Pengarang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('pengarang')) ? 'is-invalid' : ''; ?>" id="pengarang" name="pengarang" placeholder="Masukkan pengarang buku" value="<?= (old('pengarang') ? old('pengarang') : $buku['pengarang']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pengarang'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="penerbit">Penerbit</label>
                        <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" placeholder="Masukkan penerbit buku" value="<?= (old('penerbit') ? old('penerbit') : $buku['penerbit']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('penerbit'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="isbn">ISBN</label>
                        <input type="text" class="form-control <?= ($validation->hasError('isbn')) ? 'is-invalid' : ''; ?>" id="isbn" name="isbn" placeholder="Masukkan isbn buku" value="<?= (old('isbn') ? old('isbn') : $buku['isbn']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('isbn'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thn_terbit">Tahun Terbit</label>
                        <input type="number" class="form-control <?= ($validation->hasError('thn_terbit')) ? 'is-invalid' : ''; ?>" id="thn_terbit" name="thn_terbit" placeholder="Masukkan tahun terbit buku" value="<?= (old('thn_terbit') ? old('thn_terbit') : $buku['thn_terbit']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('thn_terbit'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="jumlah_buku">Jumlah Buku</label>
                        <input type="number" class="form-control <?= ($validation->hasError('jumlah_buku')) ? 'is-invalid' : ''; ?>" id="jumlah_buku" name="jumlah_buku" placeholder="Masukkan jumlah buku" value="<?= (old('jumlah_buku') ? old('jumlah_buku') : $buku['jumlah_buku']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah_buku'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="gambar">URL Gambar</label>
                        <input type="text" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" placeholder="Masukkan URL gambar buku" value="<?= (old('gambar') ? old('gambar') : $buku['gambar']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="col d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="mr-2" data-feather="save"></i>Simpan Buku</button>
                        <a href="/buku" class="btn btn-white btn-lg">Kembali</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>