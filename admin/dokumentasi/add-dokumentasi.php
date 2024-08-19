<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-upload"></i> Upload Dokumentasi Kegiatan
        </h3>
    </div>

    <div class="card-body">
        <form action="upload_dokumentasi.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_kegiatan">Judul Kegiatan:</label>
                <input type="text" name="judul_kegiatan" id="judul_kegiatan" class="form-control" placeholder="Masukkan Judul Kegiatan" required>
            </div>

            <div class="form-group">
                <label for="deskripsi_kegiatan">Deskripsi Kegiatan:</label>
                <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="form-control" rows="4" placeholder="Masukkan Deskripsi Kegiatan" required></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_kegiatan">Tanggal Kegiatan:</label>
                <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="file_dokumentasi">Upload Dokumentasi (Foto/Video):</label>
                <input type="file" name="file_dokumentasi[]" id="file_dokumentasi" class="form-control-file" accept="image/*,video/*" multiple required>
                <small class="form-text text-muted">Anda bisa meng-upload lebih dari satu file.</small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </form>
    </div>
</div>
