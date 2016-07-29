<form id="f_tambah_kecamatan" method="POST" role="form">
    <div class="form-group">
        <input type="text" name="kode" id="kode" class="form-control" required placeholder="Kode Kecamatan">
    </div>
    <div class="form-group">
        <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" required placeholder="Nama Kecamatan">
    </div>
    <input type="hidden" name="id_kecamatan" id="id_kecamatan">
    <div class="form-group">
        <input type="submit" class="btn btn-primary text-right" id="tambah_kecamatan" value="Tambah Kecamatan">
    </div>
    <div class="form-group">
        <button class="btn btn-success" style="display: none;" id="ubah_kecamatan">Ubah Kecamatan</button>
    </div>

</form>