<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data 
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <?php
                include 'koneksi.php';
                
                // Fetch the highest ID
                $query = mysqli_query($koneksi, "SELECT max(id_lpj) as kodeTerbesar FROM tb_lpj");
                $data = mysqli_fetch_array($query);
                $id_lpj = $data['kodeTerbesar'];
                $urutan = (int) substr($id_lpj, 3, 3);
                $urutan++;
                $huruf = "PH";
                $id_lpj = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID LPJ</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_lpj" name="id_lpj" placeholder="id_lpj" required="required" value="<?php echo htmlspecialchars($id_lpj); ?>" readonly>
                </div>
            </div>
              
            <!-- Dropdown untuk ID Proker -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Proker</label>
                <div class="col-sm-5">
                    <select class="form-control" id="id_proker" name="id_proker" required>
                        <option value="">-- Pilih proker --</option>
                        <?php
                        $query_proker = mysqli_query($koneksi, "SELECT * FROM tb_proker");
                        while ($data_proker = mysqli_fetch_array($query_proker)) {
                            echo "<option value='".htmlspecialchars($data_proker['id_proker'])."'>".htmlspecialchars($data_proker['id_proker'])." - ".htmlspecialchars($data_proker['nama_proker'])."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-5">
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <option value="LPJ_Kegiatan">LPJ Kegiatan</option>
                        <option value="LPJ_Pengurus">LPJ Pengurus</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload LPJ</label>
                <div class="col-sm-6">
                    <input type="file" id="upload_lpj" name="upload_lpj" accept=".pdf,.doc,.docx" required>
                    <p class="help-block">
                        Format file harus .pdf, .doc, atau .docx
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-lpj" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    $sumber = $_FILES['upload_lpj']['tmp_name'];
    $target = 'file/';
    $nama_file = $_FILES['upload_lpj']['name'];
    $file_extension = pathinfo($nama_file, PATHINFO_EXTENSION);
    $allowed_extensions = ['pdf', 'doc', 'docx'];

    // Validate file extension
    if (in_array($file_extension, $allowed_extensions)) {
        $nama_file_new = uniqid() . '.' . $file_extension; // Avoid duplicate file names
        $pindah = move_uploaded_file($sumber, $target . $nama_file_new);

        if ($pindah) {
            // Prepare and execute SQL statement
            $stmt = $koneksi->prepare("INSERT INTO tb_lpj (id_lpj, id_proker, nama_kegiatan, tahun, kategori, keterangan, upload_lpj) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $_POST['id_lpj'], $_POST['id_proker'], $_POST['nama_kegiatan'], $_POST['tahun'], $_POST['kategori'], $_POST['keterangan'], $nama_file_new);
            
            if ($stmt->execute()) {
                $status = $_SESSION['ses_status'] == 'anggota' ? 'data-lpj2' : 'data-lpj';
                echo "<script>
                    Swal.fire({
                        title: 'Tambah Data Berhasil',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=$status';
                        }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        title: 'Tambah Data Gagal',
                        text: 'Terjadi kesalahan saat menyimpan data ke database.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=add-lpj';
                        }
                    });
                </script>";
            }
            $stmt->close();
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Gagal, File Tidak Dapat Dipindahkan',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=add-lpj';
                    }
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Gagal, Format File Tidak Didukung',
                text: 'Hanya file dengan format .pdf, .doc, atau .docx yang diperbolehkan.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=add-lpj';
                }
            });
        </script>";
    }
}
?>
