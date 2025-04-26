<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url("/assets/img/avatar/avatar-5.png") ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Azhar</div>
            </a><div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="<?= site_url('Profile') ?>" class="dropdown-item has-icon"> 
                  <i class="far fa-user"></i> Profile</a>
            <div class="dropdown-divider"></div>  
            <?php echo anchor('../Login/logout', '<div class="dropdown-item">
                  <i class="fas fa-sign-out-alt"> </i> Logout
              </div>'); ?>
          </div>
        </li>
      </nav>