<div id="main-content">
    <div class="page-heading">
        <!-- ... (bagian awal halaman) ... -->
        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/book/update/' . $a['id_book'])?>" method="post" enctype="multipart/form-data">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Edit Buku</h4>
                        <a href="<?= site_url('/book') ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <!-- ... (elemen input lainnya) ... -->
                                        <div class="col-md-4">
                                            <label>Cover</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                    <input type="file" class="form-control" placeholder="Cover" name="cover" id="cover" onchange="previewImage()">
                                                    <img id="preview" src="<?= base_url('images/' . $a['cover']) ?>" alt="" style="max-width: 100px; margin-top: 10px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Nama Buku</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama Buku" name="nama_b" id="first-name-icon" value="<?= $a['nama_b'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-book"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Penulis</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Penulis" name="penulis" id="penulis" value="<?= $a['penulis'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Penerbit</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Penerbit" name="penerbit" id="penerbit" value="<?= $a['penerbit'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Tahun</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Tahun" name="tahun" id="tahun" value="<?= $a['tahun'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-123"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Sipnopsis</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Sipnopsis" name="sipnopsis" id="sipnopsis" value="<?= $a['sipnopsis'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-pencil"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Stok</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Stok" name="stok" id="stok" value="<?= $a['stok'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-stack"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Link</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Link Drive" name="link" id="link" value="<?= $a['link'] ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-link"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Kategori</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="kategori">
                                                            <option>-PILIH-</option>
                                                            <?php foreach ($kategori as $kat) { ?>
                                                                <option value="<?= $kat->id_kategori ?>" <?php if ($a['kategori'] == $kat->id_kategori) echo 'selected' ?>>
                                                                    <?= $kat->nama_k ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ... (elemen input lainnya) ... -->

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('#cover').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
