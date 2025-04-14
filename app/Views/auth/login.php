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

    <div id="app">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div>
                            <img id="mentul-mentul" src="<?php echo base_url('/assets/img/logo-evanotranshitam.png') ?>"  style="border-radius:5px" alt="logo" width="100%">
                        </div>
                        <br>
                        <div class="card card-red">
                            <div class="card-header">
                                <h3>Login ORS</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p><small>[ OKI RENTCAR SYSTEM ]</small></p>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" @submit.prevent="auth">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus
                                        @input="$v.username.$touch()"
                              @blur="$v.username.$touch()">
                            <div class="error-validasi" v-if="!usernameErrors"><small>Username wajib diisi !</small></div> 
                                        <div class="invalid-feedback">
                                            Username Wajib Di isi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required
                                        :type="showPassword ? 'text' : 'password'" 
                                         @click.prevent="() => (showPassword = !showPassword)"
                                            v-model.trim="password"
                                            @input="$v.password.$touch()"
                                            @blur="$v.password.$touch()" >
                                                <span class="input-group-text">
                                    <i :class="(showPassword==true) ? 'fa fa-eye' : 'fa fa-eye-slash'"></i>
                                    </span>
                                </div>
                                    <div class="error-validasi" v-if="!passwordErrors"><small>Password wajib diisi !</small></div>
                                        <div class="invalid-feedback">
                                            Password Wajib Di isi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" @click.prevent="auth()" :disabled="(isLoading==true) ? true: false">
                                            <i :class="(isLoading==true) ? 'fa fa-spin fa-spinner': ''"></i> Login
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
                        <div style="text-align: center;">
                            Copyright &copy;2025 All rights reserved | Oki Rentcar.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
const site_url = "<?= site_url() ?>";
const base_url = "<?= base_url() ?>";

Vue.use(window.vuelidate.default)
new Vue({
  el: '#app',
  data: {
    username: '',
    password: '',
    isLoading: false,
    showPassword: false
  },
  validations: {
    username: {
      isRequired: validators.required
    },
    password: {
      isRequired: validators.required
    },
  },

  computed: {
    usernameErrors () {
      var errors = true
      if (this.$v.username.$dirty && !this.$v.username.isRequired) {
        errors = false
      }
      return errors
    },
    passwordErrors(){
      var errors = true
      if (this.$v.password.$dirty && !this.$v.password.isRequired) {
        errors = false
      }
      return errors
    }
  },

  created() {
    this.$v.password.isRequired = true   
  },
  methods: {
    auth: function(event) {
      const self = this;
      self.$v.username.$touch();
      self.$v.password.$touch();
      if (self.$v.username.$invalid || self.$v.password.$invalid) {
        console.log('error form invalid')
      } else {
        if (self.isLoading == false) {
          toastr.clear();
          self.isLoading = true;
          var formdata = new FormData();
          formdata.append('username', self.username);
          formdata.append('password', self.password);
          axios({
              method: 'post',
              url: site_url + '/check_auth',
              data: formdata,
            })
            .then(function(response) {
              if (response.data.success == true) {
                setTimeout(function() {
                  toastr.success(response.data.message, 'Berhasil', {
                    "closeButton": true,
                    "timeOut": 2000
                  });
                  setTimeout(function() {
                    self.isLoading = false;
                    window.location.href = site_url + '/beranda';
                  }, 1000);
                }, 1000);
              } else {
                setTimeout(function() {
                  toastr.warning(response.data.message, 'Maaf', {
                    "closeButton": true,
                    "timeOut": 2500
                  });
                  self.isLoading = false;
                }, 1000);
              }
            })
            .catch((err) => {
              toastr.error(response.data.message, 'Maaf', {
                "closeButton": true,
                "timeOut": 2000
              });
            })
        }
      }
    }
  }
})
</script>

<?= $this->endSection() ?>
