
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
        <section class="section">
          <?= $this->renderSection('content') ?>
        </section>
      </div>
      <footer class="main-footer">
        <?= $this->include('layout/adminFooter') ?>
      </footer>
    </div>
  </div>

  <?= $this->include('layout/adminJs') ?>
</body>
</html>