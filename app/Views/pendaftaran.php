<script src="<?php echo base_url('assets/static/js/initTheme.js')?>" ></script>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
             
            </div>
            <h1 class="auth-title">Sign Up</h1>
            
            <form class="form-horizontal form-label-left" novalidate action="<?= base_url('Home/aksi_tambah_user')?>" method="post" enctype="multipart/form-data">
            <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  class="form-control form-control-xl"
                  placeholder="E-Mail" name="email"
                />
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  class="form-control form-control-xl"
                  placeholder="Nama" name="nama"
                />
                <div class="form-control-icon">
                  <i class="bi bi-123"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  class="form-control form-control-xl"
                  placeholder="Username" name="username"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  placeholder="Password" name="pswd"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
            
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Sign Up
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Already have an account?
                <a href="/login" class="font-bold">Log in</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
  </body>
</html>