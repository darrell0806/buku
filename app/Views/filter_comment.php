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
          <section id="basic-horizontal-layouts">
            <div class="row match-height">
              <div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Windows Print</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" novalidate
                        action="
                        <?php if ($kunci=='print_comment') {
                        echo base_url('laporan_comment/print_windows'); 
                    }
                        ?>" method="post">
                      <form class="form form-horizontal">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Tanggal Awal</label
                              >
                            </div>
                            <div class="col-md-8 form-group">
                            <input
                      type="date"
                      class="form-control mb-3 flatpickr-no-config"
                      placeholder="Pilih Tanggal" name="awal"/>
                            </div>
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Tanggal Akhir</label
                              >
                            </div>
                            <div class="col-md-8 form-group">
                            <input
                            type="date"
                      class="form-control mb-3 flatpickr-no-config"
                      placeholder="Pilih Tanggal" name="akhir"/>
                            </div>
                           
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                              >
                                Submit
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <section id="basic-horizontal-layouts">
            <div class="row match-height">
              <div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PDF</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" novalidate
                        action="
                        <?php if ($kunci=='print_comment') {
                        echo base_url('laporan_comment/pdf'); 
                    }
                        ?>" method="post">
                      <form class="form form-horizontal">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Tanggal Awal</label
                              >
                            </div>
                            <div class="col-md-8 form-group">
                            <input
                      type="date"
                      class="form-control mb-3 flatpickr-no-config"
                      placeholder="Pilih Tanggal" name="awal"/>
                            </div>
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Tanggal Akhir</label
                              >
                            </div>
                            <div class="col-md-8 form-group">
                            <input
                            type="date"
                      class="form-control mb-3 flatpickr-no-config"
                      placeholder="Pilih Tanggal" name="akhir"/>
                            </div>
                           
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                              >
                                Submit
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <section id="basic-horizontal-layouts">
            <div class="row match-height">
              <div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Excel</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                    <form class="form-horizontal form-label-left" novalidate
                        action="
                        <?php if ($kunci=='print_comment') {
                        echo base_url('laporan_comment/excel'); 
                    }
                        ?>" method="post">
                      <form class="form form-horizontal">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Tanggal Awal</label
                              >
                            </div>
                            <div class="col-md-8 form-group">
                            <input
                      type="date"
                      class="form-control mb-3 flatpickr-no-config"
                      placeholder="Pilih Tanggal" name="awal"/>
                            </div>
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Tanggal Akhir</label
                              >
                            </div>
                            <div class="col-md-8 form-group">
                            <input
                            type="date"
                      class="form-control mb-3 flatpickr-no-config"
                      placeholder="Pilih Tanggal" name="akhir"/>
                            </div>
                           
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                              >
                                Submit
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
      
      