
<!DOCTYPE html>
<html lang="en">
<?= $this->include('layout/adminCSS') ?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?= $this->include('layout/adminHeader') ?>
      <?= $this->include('layout/adminSidebar') ?>

      <!-- Main Content -->
      <div class="main-content">
        <?= $this->renderSection('content') ?>
      </div>
      <footer class="main-footer">
        <?= $this->include('layout/adminFooter') ?>
      </footer>
    </div>
  </div>

  <script>
    const baseUrl = '<?= base_url() ?>';
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  </script>
  <?= $this->include('layout/adminJS') ?>
  <?= $this->renderSection('contentJs') ?>
</body>
</html>