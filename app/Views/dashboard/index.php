<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col px-3">
    <div class="card bg-dark d-flex justify-content-center align-items-center">
        <img class="card-img" src="https://images.unsplash.com/photo-1554625170-a99bf5e957c9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" style="height: 50vh; max-width: 100%; object-fit: cover; opacity: 45%;" , alt="Banner">
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <div class="row text-center">
                <h5 class="card-title text-white fs-2 font-bold">Perpustakaan <span class="text-white">ARS University</span></h5>
                <p class="card-text text-white">Aplikasi Memudahkan Mengelola Perpustakaan ARS University</p>
            </div>
        </div>
    </div>
</div>
<div class="col col-md-12 px-3">
    <div class="row">
        <div class="col-sm-4">
            <div class="card prod-p-card background-pattern">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5">Total Buku</h6>
                            <h3 class="m-b-0"><?= count($buku); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-primary">book</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card prod-p-card bg-dark background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Total Anggota</h6>
                            <h3 class="m-b-0 text-white"><?= count($anggota); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">groups</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card prod-p-card background-pattern">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5">Total History Peminjaman</h6>
                            <h3 class="m-b-0"><?= count($peminjaman); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-primary">work</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?= $this->endSection('content'); ?>