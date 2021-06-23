<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>

<div class="modal modal-default fade" id="Tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <?php
                // attribut
                $attribut = 'class="form-horizontal"';
                // Form open
                echo form_open(base_url('admin/kategori'), $attribut);
                ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Urutan kategori</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="urutan" placeholder="Urutan kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="Simpan Data"> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
                <?php
                // Form close
                echo form_close();
                ?>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>