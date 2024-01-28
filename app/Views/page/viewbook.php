<div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <h1 align="center">Books in Kategori <?= $nama_k; ?></h1>
    
    <div class="row">
        <?php foreach ($photos as $photo) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3" data-aos="fade">
                <form action="<?= base_url('page/likePost'); ?>" method="post">
                    <input type="hidden" name="album_id" value="<?= $id_kategori; ?>">
                    <input type="hidden" name="post_id" value="<?= $photo->id_book; ?>">

                    <div class="card text-center">
                        <br>
                        <a href="<?= base_url('images/' . $photo->cover); ?>">
                            <img src="<?= base_url('images/' . $photo->cover); ?>" alt="Image" class="img-fluid">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $photo->nama_b; ?></h5>

                           
                            <a href="<?= base_url('login'); ?>" class="btn btn-primary">Baca Sekarang</a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
