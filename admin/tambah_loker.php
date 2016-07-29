<form id="f_tambah_loker" method="POST" role="form">
    <div class="form-group">
        <input type="text" id="kode" name="kode" class="form-control" required placeholder="Kode loker">
    </div>
    <div class="form-group">
        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan"></textarea>
    </div>
    <input type="hidden" id="id_loker" name="id_loker">
    <div class="form-group">
        <input type="submit" id="tambah_loker" class="btn btn-primary text-right" value="Tambah Loker">
    </div>
    <div class="form-group">
        <button class="btn btn-success" style="display: none;" id="ubah_loker">Ubah Loker</button>
    </div>
</form>