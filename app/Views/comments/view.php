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
           
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Nama User</th>
                                    <th>Comment</th>
                                   
                                </tr>
                            </thead>
                            <?php
                            $no=1;
                            foreach ($a as $riz) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                   
                                
                                    
                                    <td><?php echo $riz->nama_b?></td>
                                    <td><?php echo $riz->nama?></td>
                                    <td><?php echo $riz->comment?></td>
                                    

                                <?php   }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>