<?= $this->extend('layout/authLayout') ?>
<?= $this->section('content') ?>


<style>
#mentul-mentul{
position: relative;
-webkit-animation: floatBubble 0.60s infinite;
    -webkit-animation-direction:alternate;
    border-radius:50%;
    margin-top:25px;
    margin-bottom: 25px;
  }

@-webkit-keyframes floatBubble{
 from{
        top:0;
        -webkit-animation-timing-function: ease-in;
   }

   to {
      top: 25px;
      -webkit-animation-timing-function: ease-in;
   }
}
</style>



<body>
    <div id="app">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img id="mentul-mentul" src="<?php echo base_url('/assets/img/logo-okirentcar.png') ?>"  style="border-radius:5px" alt="logo" width="50%">
                        </div>
                        <br>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>Login ORS</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><small>[ OKI RENTCAR SYSTEM ]</small></p>
                            </div>
                            <div class="card-body">
                                <?php if (!empty(session()->getFlashdata('error'))) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo session()->getFlashdata('error') ?>
                                    </div>
                                <?php } ?>

                                <form method="POST" action="<?= site_url('check_auth') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Username Wajib Di isi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <?php // echo form_error('password', '<div class="text-danger small">','</div>')
                                        ?>
                                        <div class="invalid-feedback">
                                            Password Wajib Di isi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                        <div style="margin-bottom:-25px" class="mt-3 text-muted text-center">
                                            Kembali ke Halaman <a href="<?php echo base_url('#') ?>">Home</a>
                                            <!-- |
                                            Belum Punya Akun ? <a href="<?php echo base_url('Register') ?>">Buat Disini</a> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</footer>
</body>

</html>


<?= $this->endSection() ?>
