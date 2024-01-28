<div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <h1 class="text-center mb-4">Pilihan Buku dengan berbagai Kategori</h1>
    <div class="row">
        <?php foreach ($albums as $album) : ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" align="center"><?= $album['nama_k']; ?></h5>
                        <div class="text-center">
                            <a href="<?= base_url('page/viewBooks/' . $album['id_kategori']); ?>" class="btn btn-outline-primary">More Books</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
