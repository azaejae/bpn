<form id="f_tambah_berkas" method="POST" role="form">
    <div class="form-group">
        <input type="text" name="no_buku" class="form-control" required placeholder="No Buku">
    </div>
    <div class="form-group">
        <input type="text" name="barcode" class="form-control" required placeholder="Barcode">
    </div>
    <div class="form-group">
        <input type="text" name="desa" class="form-control" id="desa" required placeholder="Nama Desa">
    </div>
    <div class="form-group">
        <input type="text" name="loker" class="form-control" id="loker" required placeholder="Kode Loker">
    </div>
    <div class="form-group">
        <input type="text" name="nama_pemegang_hak" class="form-control" required placeholder="Nama Pemegang Hak">
    </div>
    <div class="form-group">
        <input type="text" name="jenis_hak" class="form-control" required placeholder="Jenis Hak">
    </div>
    <div class="form-group">
        <input type="text" name="nomor_hak" class="form-control" required placeholder="Nomor Hak">
    </div>
    <div class="form-group">
        <input type="text" name="d_i_307" class="form-control" required placeholder="Daftar Isian 307">
    </div>
    <div class="form-group">
        <input type="text" name="d_i_208" class="form-control" required placeholder="Daftar Isian 208">
    </div>
    <div class="form-group">
        <input type="text" name="surat_ukur" class="form-control" required placeholder="Surat Ukur">
    </div>
    <div class="form-group">
        <input type="text" id="tgl_surat_ukur" name="tgl_surat_ukur" class="form-control" required placeholder="Tanggal Surat Ukur">
    </div>
    <div class="form-group">
        <input type="number" name="luas" min="1" class="form-control" required placeholder="Luas">
    </div>
    <div class="form-group">
        <input type="text" id="tgl_terbit" name="tgl_terbit" required placeholder="Tgl terbit" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="penerbit" class="form-control" required placeholder="Penerbit">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="asal_hak" placeholder="Asal Hak..."></textarea>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="penunjuk" placeholder="Penunjuk..."></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary text-right" value="Tambah Berkas">
    </div>
    <input type="hidden" name="id_desa_kel" id="id_desa_kel">
    <input type="hidden" name="id_loker" id="id_loker">
</form>