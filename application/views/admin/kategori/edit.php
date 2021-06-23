<?php
// Error warning
echo validation_errors('<div class="alert alert-danger">', '</div>');

// attribut
$attribut = 'class="form-horizontal"';
// Form open
echo form_open(base_url('admin/kategori/edit/' . $kategori->id_kategori), $attribut);
?>
<div class="form-group">
    <label class="col-sm-3 control-label">Nama kategori</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" required="required" value="<?php echo $kategori->nama_kategori ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Urutan kategori</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" name="urutan" placeholder="Urutan kategori" value="<?php echo $kategori->urutan ?>">
    </div>
</div>
<div class="modal-footer">
    <p class="text-right">
        <input type="submit" name="submit" class="btn btn-primary btn-md" value="Simpan">
        <input type="button" class="btn btn-danger btn-md" value="Kembali" onclick="history.back(-1)">
    </p>
</div>
<?php
// Form close
echo form_close();
?>