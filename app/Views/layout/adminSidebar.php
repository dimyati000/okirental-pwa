<style>
#mentul-mentul{
    text-align: center;
    position: relative;
    -webkit-animation-direction:alternate;    
    -webkit-animation: floatBubble 0.90s infinite;
    margin-top: 5px;
    margin-bottom: 5px;
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

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">    
        <div class="sidebar-brand">
            <img src="<?php echo base_url('/assets/img/logo-okirentcar.png') ?>"  style="margin-top:10px" alt="logo" width="50%">
            <br>
            <a href="#">Oki Rentcar System</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">ORS</a>
        </div>
        <ul class="sidebar-menu">
        <li class=active><a class="nav-link" href="<?php echo base_url('Beranda') ?>"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
        <li class="menu-header">Master Data</li>
        <li><a class="nav-link" href="<?php echo base_url('Pelanggan') ?>"><i class="fas fa-user"></i> <span>Pelanggan</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('Mobil') ?>"><i class="fas fa-car"></i> <span>Mobil</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('Jaminan') ?>"><i class="fas fa-medal"></i> <span>Jaminan</span></a></li>
        <li class="menu-header">Transaksi</li>
        <li><a class="nav-link" href="<?php echo base_url('FormSewa') ?>"><i class="fas fa-file-alt"></i> <span>Form Sewa</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('DaftarSewa') ?>"><i class="fas fa-list"></i> <span>Daftar Sewa</span></a></li>
        </ul>

        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
        </div> -->
    </aside>
</div>