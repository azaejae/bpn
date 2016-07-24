<form id="f_tambah_desa" method="POST" role="form">
    <div class="form-group">
        <input type="text" id="nama_kec" class="form-control" required placeholder="Nama Kecamatan">
    </div>
    <div class="form-group">
        <input type="text" name="kode" class="form-control" required placeholder="Kode Desa">
    </div>
    <div class="form-group">
        <input type="text" name="nama_desa" class="form-control" required placeholder="Nama Desa">
    </div>
    <input type="hidden" name="id_kecamatan" id="id_kec">
    <div class="form-group">
        <input type="submit" class="btn btn-primary text-right" value="Tambah Desa">
    </div>
</form>