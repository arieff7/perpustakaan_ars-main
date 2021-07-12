<?php
// Alternative Get Current Route
// $router = \CodeIgniter\Config\Services::router();
// $current_route = $router->getMatchedRoute(0)[0];
// function getCurrent($input)
// {
//     $router = \CodeIgniter\Config\Services::router();
//     $current_route = $router->getMatchedRoute(0)[0];
//     return stripos($title, $input, 0) !== false;
// };
?>
<header class="mb-4 card sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-3 py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Logo-ars.png" height="40" width="40"><span class="text-navy"> ARS University</span></span></a>
            <button class="navbar-toggler collapsed " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse justify-content-end text-center" id="navbarNav">
                <ul class="navbar-nav nav mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a href="/" class="nav-link <?= (stripos($title, "Dashboard", 0) !== false ? "text-white fw-bold bg-dark rounded-3" : ""); ?>"><i class="mr-2" data-feather="home"></i>Home</a></li>
                    <li class="nav-item mx-2"><a href="/buku" class="nav-link <?= (stripos($title, "Buku", 0) !== false ? "text-white fw-bold bg-dark rounded-3" : ""); ?>"><i class="mr-2" data-feather="book"></i>Buku</a></li>
                    <li class="nav-item mx-2"><a href="/anggota" class="nav-link <?= (stripos($title, "Anggota", 0) !== false ? "text-white fw-bold bg-dark rounded-3" : ""); ?>"><i class="mr-2" data-feather="users"></i>Anggota</a></li>
                    <li class="nav-item mx-2"><a href="/peminjaman" class="nav-link <?= (stripos($title, "Peminjaman", 0) !== false ? "text-white fw-bold bg-dark rounded-3" : ""); ?>"><i class="mr-2" data-feather="briefcase"></i>Peminjaman</a></li>
                    <li class="nav-item mx-2"><a href="/pengembalian" class="nav-link <?= (stripos($title, "Pengembalian", 0) !== false ? "text-white fw-bold bg-dark rounded-3" : ""); ?>"><i class="mr-2" data-feather="check-square"></i>Pengembalian</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>