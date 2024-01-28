<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?=$title?></h3>
                    <p class="text-subtitle text-muted">Anda dapat melihat data <?=$title?> di bawah</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url('login/dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
            <div class="card-header">
					<a href="<?php echo base_url('/peminjaman/tambah/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
					Tambah</button></a>
				</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $no=1;
                            foreach ($a as $riz) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                   
                                
                                    <td><?php echo $riz->nama?></td>
                                    <td><?php echo $riz->nama_b?></td>
                                    <td><?php echo $riz->tgl_pinjam?></td>
                                    <td><?php echo $riz->tgl_kembali?></td>
                                    <td><?php echo $riz->jumlah?></td>
                                    <td><?php echo $riz->status?></td>
                                    <td>
                                        
                                    <form method="post" action="<?= base_url('/peminjaman/aksi/'.$riz->id_peminjaman) ?>">
                                        <button class="btn btn-dark" type="submit" <?= ($riz->status === 'Dikembalikan') ? 'disabled' : '' ?>>
                                            Update Status
                                        </button>
                                    </form>
                                    <button class="btn btn-danger" href="<?php echo base_url('/peminjaman/delete/'. $riz->id_peminjaman) ?>" <?= ($riz->status === 'Dikembalikan') ? 'disabled' : '' ?>>
                                        <i class="faj-button fa-solid fa-trash"></i>Delete
                            </button>

                                    </td>

                                <?php   }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>