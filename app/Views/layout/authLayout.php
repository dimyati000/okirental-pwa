<?= $this->include('layout/adminHead') ?>
  
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?= $this->renderSection('content') ?>
    </div>
</div>
    
<?= $this->include('layout/adminJs')?>