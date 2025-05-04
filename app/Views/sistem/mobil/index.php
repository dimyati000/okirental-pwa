<?= $this->extend('layout/adminLayout') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Mobil</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="javascript:;">Master</a></div>
            <div class="breadcrumb-item">Mobil</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tabel Master Data Mobil</h2>
        <p class="section-lead">Berisi Data Mobil Lama dan Mobil Baru</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Mobil</h4>
                        <!-- <div class="card-header-action"> -->
                            <a href="javascript:;" onclick="handleRefresh()"><i class="fas fa-sync"></i></a>
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <!-- <div class="row style="padding-top:12px;""> -->
                        <div class="row">
                            <div class="col-md-6">
                                    <a href="javascript:;" class="btn btn-success mr-1 mb-1" id="btn-add"> <b> <i class="fa fa-plus-circle"></i> &nbsp;Tambah</b></a>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="limit" id="limit" onchange="pageLoad(1)">
                                        <option value="10" selected>10 Baris</option>
                                        <option value="25">25 Baris</option>
                                        <option value="50">50 Baris</option>
                                        <option value="100">100 Baris</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" id="search" name="search" class="form-control"
                                            placeholder="Cari <Tekan Enter>">
                                        <div class="input-group-append cursor-pointer" onclick="pageLoad(1)">
                                            <span class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="list"></div>
                        </div>
                    </div>
                </div>      
            </div>      
        </div>
    </div>
</section>
<!-- DATA SORT -->
<input type="hidden" name="input_id_th" id="input_id_th" value="#column_waktu">
<input type="hidden" name="input_column" id="input_column" value="created_at">
<input type="hidden" name="input_sort" id="input_sort" value="desc">
<div id="div_modal"></div>
<?= $this->endSection() ?>

<?= $this->section('contentJs') ?>
<script src="<?php echo base_url() ?>/pages/mobil.js"></script>
<?= $this->endSection() ?>
