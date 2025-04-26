<?= $this->include('layout/adminCSS') ?>
  
<body>
  <!-- <div id="app"> -->
    <div class="main-wrapper main-wrapper-1">
    <?= $this->include('layout/adminHeader') ?>
      <div class="main-sidebar">
      <?= $this->include('layout/adminSidebar') ?>

      </div>
      <?= $this->renderSection('content') ?>
    </div>
  <!-- </div>   -->
</body>
  
<?= $this->include('layout/adminJs')?>
  
</html><!-- Begin Page Content -->
