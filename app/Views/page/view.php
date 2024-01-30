<style>

    /* Bounce animation keyframes */
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}

/* Apply the bounce animation to the Log In button */
.btn-bounce {
    animation: bounce 2s infinite;
}

    </style>


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

    <!-- Log In button with bounce effect -->
    <div class="text-center mt-4">
        <a href="login" class="btn btn-primary btn-lg btn-bounce">Log In Now</a>
    </div>
</div>
