<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_lpj' => '',
    'nama_kegiatan' => '',
    'tahun' => '',
    'kategori' => '',
    'keterangan' => '',
    'upload_lpj' => ''
];

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_lpj WHERE id_lpj='" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if ($query_cek) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    }
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID lpj</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_lpj" name="id_lpj" value="<?php echo htmlspecialchars($data_cek['id_lpj']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo htmlspecialchars($data_cek['nama_kegiatan']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo htmlspecialchars($data_cek['tahun']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-5">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="LPJ_Kegiatan" <?php if ($data_cek['kategori'] == "LPJ_Kegiatan") echo "selected"; ?>>LPJ Kegiatan</option>
                        <option value="LPJ_Pengurus" <?php if ($data_cek['kategori'] == "LPJ_Pengurus") echo "selected"; ?>>LPJ Pengurus</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($data_cek['keterangan']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload File</label>
                <div class="col-sm-6">
                    <a href="file/<?php echo htmlspecialchars($data_cek['upload_lpj']); ?>" target="_blank"><?php echo htmlspecialchars($data_cek['upload_lpj']); ?></a>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah File LPJ</label>
                <div class="col-sm-6">
                    <input type="file" id="upload_lpj" name="upload_lpj" accept=".pdf,.doc,.docx" />
                    <p class="help-block">
                        <font color="red">Format file harus .pdf, .doc, atau .docx</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-lpj" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    
    $sumber = $_FILES['upload_lpj']['tmp_name'];
    $target = 'file/';
    $nama_file = $_FILES['upload_lpj']['name'];
    $file_extension = pathinfo($nama_file, PATHINFO_EXTENSION);
    $allowed_extensions = ['pdf', 'doc', 'docx'];

    if (!empty($nama_file)) {
        if (in_array($file_extension, $allowed_extensions)) {
            if (move_uploaded_file($sumber, $target . $nama_file)) {
                // Delete old file
                if (!empty($data_cek['upload_lpj']) && file_exists($target . $data_cek['upload_lpj'])) {
                    unlink($target . $data_cek['upload_lpj']);
                }

                $sql_ubah = "UPDATE tb_lpj SET
                    nama_kegiatan='$nama_kegiatan',
                    tahun='$tahun',
                    kategori='$kategori',
                    keterangan='$keterangan',
                    upload_lpj='$nama_file'
                    WHERE id_lpj='" . mysqli_real_escape_string($koneksi, $_POST['id_lpj']) . "'";
            } else {
                echo "<script>
                Swal.fire({title: 'Upload file gagal', text: '', icon: 'error', confirmButtonText: 'OK'});
                </script>";
                exit;
            }
        } else {
            echo "<script>
            Swal.fire({title: 'Format file tidak valid', text: '', icon: 'error', confirmButtonText: 'OK'});
            </script>";
            exit;
        }
    } else {
        // Jika tidak ada file baru yang diunggah, simpan data lain tanpa mengubah file
        $sql_ubah = "UPDATE tb_lpj SET
            nama_kegiatan='$nama_kegiatan',
            tahun='$tahun',
            kategori='$kategori',
            keterangan='$keterangan'
            WHERE id_lpj='" . mysqli_real_escape_string($koneksi, $_POST['id_lpj']) . "'";
    }

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-lpj';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-lpj';
            }
        });
        </script>";
    }
}
?>
