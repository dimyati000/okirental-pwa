<?php 
	if(count($list)>0){
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="tr-head">
            <tr>
                <th width="5%" class="text-center">No </th>
                <th width="10%" class="sortable" data-sort="" onclick="handleSort('nik')">NIK </th>
                <th width="20%" class="sortable" data-sort="" onclick="handleSort('nama')">Nama </th>
                <th width="20%">No Telp </th>
                <th width="20%">Alamat </th>
                <th width="10%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=($paging['current']-1)*$paging['limit']; 
            foreach ($list as $row) { $no++ ?>
                <tr>
                    <td class="text-center" scope="row"><?= $no ?>.</td>
                    <td><?= $row->nik ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->no_telp ?></td>
                    <td><?= $row->alamat ?></td>
                    <td class="text-center">
                        <a href="javascript:;" data-id="<?=$row->id?>" data-name="<?=$row->nama?>" class="btn btn-sm btn-icon btn-warning waves-effect waves-light btn-ubah" data-toggle="tooltip" title="Edit Data"><i style="color:#fff;" class="fa fa-edit"></i></a>
                        <a href="javascript:;" data-id="<?=$row->id?>" data-name="<?=$row->nama?>" class="btn btn-sm btn-icon btn-danger waves-effect waves-light btn-hapus" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></a>	    
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="row">
    <br>
    <div class="col-xs-12 col-md-6" style="padding-top:5px; color:#333;">
    Menampilkan data
    <?php $batas_akhir = (($paging['current'])*$paging['limit']);
    if ($batas_akhir > $paging['count_row']) {
        $batas_akhir = $paging['count_row'];
    }
    echo ((($paging['current']-1)*$paging['limit'])+1).' - '.$batas_akhir.' dari total '.$paging['count_row']; ?>
    data
    </div>
    <br>
    <div class="col-xs-12 col-md-6">
        <div style="float:right;">
            <?php echo $paging['list']; ?>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="table-responsive">
  <table class="table table-bordered table-hover">
      <thead class="tr-head">
          <tr>
              <th width="5%" class="text-center">No </th>
              <th width="20%">Nama Kegiatan </th>
              <th width="20%" class="text-center">Kelompok Kegiatan </th>
              <th width="10%" class="text-center">Aksi</th>
          </tr>
      </thead>
      <tbody>
          <tr>
            <td colspan="4">Data tidak ditemukan !</td>
          </tr>
      </tbody>
  </table>
</div> 
<?php } ?>
<input type='hidden' id='current' name='current' value='<?php echo $paging['current'] ?>'>