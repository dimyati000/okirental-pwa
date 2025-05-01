<?= $this->extend('layout/adminLayout') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Beranda</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Pelanggan</h4>
                </div>
                <div class="card-body">
                    <?php echo $total_pelanggan; ?>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-car"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Mobil</h4>
                </div>
                <div class="card-body">
                    <?php echo $total_mobil; ?>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-car-side"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Sewa</h4>
                </div>
                <div class="card-body">
                1,201
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-times"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Total Batal Sewa</h4>
                </div>
                <div class="card-body">
                47
                </div>
            </div>
            </div>
        </div>                  
    </div>
</section>
<?= $this->endSection() ?>

