
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
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <a href="<?php echo base_url('/book/tambah/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
					Tambah</button></a>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Cover</th>
                                        <th>Nama Buku</th>
                                        <th>Penulis</th>
                                       
                                        <th>Stok</th>
                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php 
                                $no=1;
                                foreach ($a as $b) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <img src="<?=base_url('images/'.$b->cover)?>" height="100px">
                                        </td>
                                        <td><?php echo $b->nama_b?> </td>
                                        <td><?php echo $b->penulis?> </td>
                                      
                                       
                                     
                                        <td><?php echo $b->stok?> </td>
                                       
                                        <td>
                                        
                                        <a href="<?=base_url('/book/detail/'.$b->id_book)?>"><button class="btn btn-warning">Detail</button></a>
                                            <a href="<?=base_url('/book/edit/'.$b->id_book)?>"><button class="btn btn-primary">Edit</button></a>
                                            <a href="<?=base_url('/book/delete/'.$b->id_book)?>"><button class="btn btn-danger">Delete</button></a>
                                        </td>

                                    </tr>
                                    <?php
                                    }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                </section>