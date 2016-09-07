<form id="f_upload_berkas" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="halaman1">Halaman 1</label>
        <input type="file" id="halaman1" required name="berkas[]" class="form-control" placeholder="Halaman 1">
    </div>
    <div class="form-group">
        <label for="halaman2">Halaman 2</label>
        <input type="file" id="halaman2" required name="berkas[]" class="form-control" placeholder="Halaman 2">
    </div>
    <div class="form-group">
        <label for="halaman3" >Halaman 3</label>
        <input type="file" id="halaman3" required name="berkas[]" class="form-control" placeholder="Halaman 3">
    </div>
    <div class="form-group">
        <label for="halaman4">Halaman 4</label>
        <input type="file" id="halaman4" required name="berkas[]"class="form-control" placeholder="Halaman 4">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary text-right" value="Upload Berkas">
    </div>
</form>