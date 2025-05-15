<?= $this->include('layout/adminCSS') ?>
  
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?= $this->renderSection('content') ?>
    </div>
</div>

<div style="text-align: center;">
    Copyright &copy;2025 All rights reserved | Oki Rentcar.
</div>
    
<?= $this->include('layout/adminJS')?>