<div class="modal fade text-left" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title_add" style="display:none;"><i class="fa fa-align-justify"></i> Tambah Modal</h5>
                <h5 class="modal-title" id="modal_title_update" style="display:none;"><i class="fa fa-align-justify"></i> Edit Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="form">
            <div class="modal-body">
                <input type="hidden" name="modeform" id="modeform">
                <input type="hidden" name="id" id="id" value="<?php if(isset($data)){echo $data['id'];} ?>">
                <div class="form-group mb-2">
                    <label for="nik" class="form-label">NIK <span style="color:red;">*</span></label>
                    <input class="form-control" id="nik" name="nik" type="text" placeholder="NIK . . ."  
                        value="<?php if(isset($data)){echo $data['nik'];} ?>"
                        required 
                    >
                </div>
                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama <span style="color:red;">*</span></label>
                    <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama . . ."  
                        value="<?php if(isset($data)){echo $data['nama'];} ?>"
                        required 
                    >
                </div>
                <div class="form-group mb-2">
                    <label for="noTelp" class="form-label">No Telp</label>
                    <input class="form-control" id="noTelp" name="noTelp" type="text" placeholder="No Telepon . . ."  
                        value="<?php if(isset($data)){echo $data['no_telp'];} ?>"
                        required 
                    >
                </div>
                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Keterangan . . ." ><?php if(isset($data)){echo $data['alamat'];} ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="background-color:#95a5a6;color:white;" data-dismiss="modal"><b>Batal</b></button>
                <button type="submit" class="btn btn-primary" style="background-color:#3498db;color:white;"><b>Simpan</b></button>
            </div>
			</form>
        </div>
    </div>
</div>