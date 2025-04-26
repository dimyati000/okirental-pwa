<div class="main-sidebar">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
    <div class="m-2">
        <a href="<?php echo('#')?>">
        <img src="<?php echo base_url('/assets/img/logo-favicon.png') ?>"  style="border-radius:5px" alt="logo" width="50%">
        </a>
    </div>
    <p>OKI RENTCAR SYSTEM</p>
    </div>
    <ul class="sidebar-menu">
    <li class="menu-header">MENU</li>
    <li class="active"><a class="nav-link" href="<?php echo base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Master Data</li>
    <li><a class="nav-link" href="<?php echo base_url('Pelanggan') ?>"><i class="fas fa-user"></i> <span>Pelanggan</span></a></li>
    <li><a class="nav-link" href="<?php echo base_url('Mobil') ?>"><i class="fas fa-car"></i> <span>Mobil</span></a></li>
    <li><a class="nav-link" href="<?php echo base_url('Jaminan') ?>"><i class="fas fa-certificate"></i> <span>Jaminan</span></a></li>
    <li class="menu-header">Transaksi</li>
    <li><a class="nav-link" href="<?php echo base_url('FormSewa') ?>"><i class="fas fa-file"></i> <span>Form Sewa</span></a></li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-check"></i> <span>Daftar Sewa</span></a>
        <ul class="dropdown-menu">
        <a class="nav-link" href="<?php echo base_url('DaftarSewa/penumpang') ?>"><i class="fas fa-car-side"></i> <span>Sewa Penumpang</span></a>
        <a class="nav-link" href="<?php echo base_url('DaftarSewa/barang') ?>"><i class="fas fa-truck"></i> <span>Sewa Barang</span></a>
        </ul>
    </li>
    <li><a class="nav-link" href="<?php echo base_url('Laporan') ?>"><i class="fas fa-archive"></i> <span>Laporan Transaksi</span></a></li>
    <!-- <li><a href="<?php echo base_url() . 'Tentang'?>"><i class="fas fa-cog"></i><span>Setting</span></a></li> -->
    </ul>
</aside>
</div>