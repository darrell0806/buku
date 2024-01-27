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
					<a href="<?php echo base_url('/kategori/tambah/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
					Tambah</button></a>
				</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $no=1;
                            foreach ($jojo as $riz) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                   
                                
                                    <td><?php echo $riz->nama_k?></td>
                                    <td>
                                        
                                        <a class="btn btn-warning" href="<?php echo base_url('/kategori/edit/'. $riz->id_kategori) ?>"><i class="faj-button fa-solid fa-pencil"></i>Edit</a>
                                        <a class="btn btn-danger" href="<?php echo base_url('/kategori/delete/'. $riz->id_kategori) ?>"><i class="faj-button fa-solid fa-trash"></i>Delete</a>
                                    </td>

                                <?php   }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>