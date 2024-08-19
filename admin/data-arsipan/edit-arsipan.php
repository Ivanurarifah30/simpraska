<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_data' => '',
    'nama_file' => '',
    'tahun' => '',
    'kategori' => '',
    'keterangan' => '',
    'upload_file' => ''
];

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_arsipan WHERE id_data='" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if ($query_cek && mysqli_num_rows($query_cek) > 0) {
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
                <label class="col-sm-2 col-form-label">ID Data</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_data" name="id_data" value="<?php echo htmlspecialchars($data_cek['id_data']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama File</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_file" name="nama_file" value="<?php echo htmlspecialchars($data_cek['nama_file']); ?>" required />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo htmlspecialchars($data_cek['tahun']); ?>" required />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-5">
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Surat-surat" <?php if ($data_cek['kategori'] == "Surat-surat") echo "selected"; ?>>Surat-Surat</option>
                        <option value="Arsipan Lainnya" <?php if ($data_cek['kategori'] == "Arsipan Lainnya") echo "selected"; ?>>Arsipan Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($data_cek['keterangan']); ?>" required />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload File</label>
                <div class="col-sm-6">
                    <p><a href="file/<?php echo htmlspecialchars($data_cek['upload_file']); ?>" target="_blank"><?php echo htmlspecialchars($data_cek['upload_file']); ?></a></p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah File</label>
                <div class="col-sm-5">
                    <input type="file" id="upload_file" name="upload_file">
                    <p class="help-block">
                        <font color="red">"Format file PDF"</font>
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-arsipan" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $id_data = mysqli_real_escape_string($koneksi, $_POST['id_data']);
    $nama_file = mysqli_real_escape_string($koneksi, $_POST['nama_file']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $upload_file = $data_cek['upload_file'];
    if (!empty($_FILES['upload_file']['name'])) {
        $sumber = $_FILES['upload_file']['tmp_name'];
        $nama_file_baru = $_FILES['upload_file']['name'];
        $target = 'file/' . $nama_file_baru;

        if (move_uploaded_file($sumber, $target)) {
            if (file_exists('file/' . $upload_file)) {
                unlink('file/' . $upload_file);
            }
            $upload_file = $nama_file_baru;
        } else {
            echo "<script>
                Swal.fire({title: 'Upload File Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
                .then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=data-arsipan';
                    }
                });
                </script>";
            exit;
        }
    }

    $sql_ubah = "UPDATE tb_arsipan SET
        nama_file='$nama_file',
        tahun='$tahun',
        kategori='$kategori',
        keterangan='$keterangan',
        upload_file='$upload_file'
        WHERE id_data='$id_data'";
    
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-arsipan';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-arsipan';
            }
        });
        </script>";
    }
}
?>
