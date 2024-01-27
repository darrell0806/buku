<!-- app/Views/book/detail.php -->

<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $title ?></h3>
                    <p class="text-subtitle text-muted">Detail Buku</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('login/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('book') ?>">Daftar Buku</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center"> <!-- Menambah kelas 'justify-content-center' untuk menengahkan konten -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header text-center"> <!-- Menambah kelas 'text-center' untuk menengahkan teks -->
                    <h4 class="card-title"><?= $book['nama_b'] ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body"> <!-- Menambah kelas 'text-center' untuk menengahkan konten -->
                        <img src="<?= base_url('images/' . $book['cover']) ?>" alt="Cover Buku" class="img-fluid rounded mx-auto" style="max-width: 300px; display: block;">
                        <br>
                        <p><strong>Penulis:</strong> <?= $book['penulis'] ?></p>
                        <p><strong>Penerbit:</strong> <?= $book['penerbit'] ?></p>
                        <p><strong>Tahun:</strong> <?= $book['tahun'] ?></p>
                        <p><strong>Sipnopsis:</strong> <?= $book['sipnopsis'] ?></p>
                        <p><strong>Stok:</strong> <?= $book['stok'] ?></p>
                        <p><strong>Baca Online:</strong> <a href="<?= $book['link'] ?>" target="_blank"><?= $book['link'] ?></a></p>
                        <p><strong>Kategori:</strong> <?= $book['nama_k'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
