<form id="f_tambah_user" method="POST" role="form">
    <div class="form-group">
        <input type="text" name="nip" class="form-control" required placeholder="NIP">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" required placeholder="password">
    </div>
    <div class="form-group">
        <input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap">
    </div>
    <div class="form-group">
        <select name="status" class="form-control">
            <option value="2">Pilih Status Pengguna....</option>
            <option value="2">Anak Honor</option>
            <option value="1">Pegawai</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary text-right" value="Tambah Pengguna">
    </div>
</form>