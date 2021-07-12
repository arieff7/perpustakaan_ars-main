<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col">
                        <h5>Edit Anggota</h5>
                        <span class="d-block m-t-5">Edit data anggota yang terdaftar dalam database</span>
                    </div>
                    <!-- <button type="button" class="btn  btn-primary btn-lg"><i class="mr-2" data-feather="save"></i>Simpan Buku</button> -->
                </div>

            </div>
            <div class="card-body">
                <form action="/anggota/update/<?= $anggota['id_anggota']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label" for="nama_anggota">Nama Anggota</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_anggota')) ? 'is-invalid' : ''; ?>" id="nama_anggota" name="nama_anggota" placeholder="Masukkan nama anggota" autofocus value="<?= (old('nama_anggota') ? old('nama_anggota') : $anggota['nama_anggota']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_anggota'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="gender">Jenis Kelamin</label>
                        <select class="form-select <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="gender" name="gender">
                            <option value="" disabled>Pilih Jenis Kelamin...</option>
                            <option value="Laki-Laki" <?= ($anggota['gender'] == "Laki-Laki" ? "selected" : ""); ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= ($anggota['gender'] == "Perempuan" ? "selected" : ""); ?>>Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('gender'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="no_telp">No Telp</label>
                        <input type="tel" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" placeholder="Masukkan judul anggota" value="<?= (old('no_telp') ? old('no_telp') : $anggota['no_telp']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_telp'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Masukkan judul anggota" value="<?= (old('alamat') ? old('alamat') : $anggota['alamat']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">E-mail</label>
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan judul anggota" value="<?= (old('email') ? old('email') : $anggota['email']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>

                    <hr>
                    <div class="col d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="mr-2" data-feather="save"></i>Simpan Anggota</button>
                        <a href="/anggota" class="btn btn-white btn-lg">Kembali</a>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>