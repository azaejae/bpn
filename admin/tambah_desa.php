<form id="f_tambah_desa" method="POST" role="form">
    <div class="form-group">
        <input type="text" id="nama_kec" class="form-control" required placeholder="Nama Kecamatan">
    </div>
    <div class="form-group">
        <input type="text" name="kode" id="kode" class="form-control" required placeholder="Kode Desa">
    </div>
    <div class="form-group">
        <input type="text" name="nama_desa" id="nama_desa" class="form-control" required placeholder="Nama Desa">
    </div>
    <input type="hidden" name="id_kecamatan" id="id_kec">
    <input type="hidden" name="id_desa" id="id_desa">
    <div class="form-group">
        <input type="submit" class="btn btn-primary text-right" id="tambah_desa" value="Tambah Desa">
    </div>
    <div class="form-group">
        <button class="btn btn-success" style="display: none;" id="ubah_desa">Ubah Desa</button>
    </div>
</form>