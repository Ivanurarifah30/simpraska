<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_proker' => '',
    'nama_proker' => '',
    'tgl_ditetapkan' => '',
    'status' => '',
    'id_pj' => '',
    'keterangan' => '',
    'upload_rab' => ''
];

if (isset($_GET['kode'])) {
    $kode_proker = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_proker WHERE id_proker='$kode_proker'";
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
                <label class="col-sm-2 col-form-label">ID Proker</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_proker" name="id_proker" value="<?php echo htmlspecialchars($data_cek['id_proker']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Proker</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_proker" name="nama_proker" value="<?php echo htmlspecialchars($data_cek['nama_proker']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Ditetapkan</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="tgl_ditetapkan" name="tgl_ditetapkan" value="<?php echo htmlspecialchars($data_cek['tgl_ditetapkan']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="status" id="status" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Direncanakan" <?php if ($data_cek['status'] == "Direncanakan") echo "selected"; ?>>Direncanakan</option>
                        <option value="Berlangsung" <?php if ($data_cek['status'] == "Berlangsung") echo "selected"; ?>>Berlangsung</option>
                        <option value="Selesai" <?php if ($data_cek['status'] == "Selesai") echo "selected"; ?>>Selesai</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Penanggungjawab</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_pj" name="id_pj" value="<?php echo htmlspecialchars($data_cek['id_pj']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($data_cek['keterangan']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload RAB</label>
                <div class="col-sm-6">
                    <?php if (!empty($data_cek['upload_rab'])): ?>
                        <a href="file/<?php echo htmlspecialchars($data_cek['upload_rab']); ?>" target="_blank">Lihat File</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah RAB</label>
                <div class="col-sm-5">
                    <input type="file" id="upload_rab" name="upload_rab" accept=".pdf">
                    <p class="help-block">
                        <font color="red">"Format file PDF"</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-proker" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $nama_proker = mysqli_real_escape_string($koneksi, $_POST['nama_proker']);
    $tgl_pelaksana = mysqli_real_escape_string($koneksi, $_POST['tgl_pelaksana']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $id_pj = mysqli_real_escape_string($koneksi, $_POST['id_pj']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    
    $sumber = @$_FILES['upload_rab']['tmp_name'];
    $target = 'file/';
    $nama_file = @$_FILES['upload_rab']['name'];
    $upload_rab = $data_cek['upload_rab'];

    if (!empty($sumber)) {
        if (file_exists("file/$upload_rab")) {
            unlink("file/$upload_rab");
        }

        if (move_uploaded_file($sumber, $target . $nama_file)) {
            $upload_rab = $nama_file;
        } else {
            echo "<script>
            Swal.fire({title: 'Upload File Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
            .then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=data-proker';
                }
            });
            </script>";
            exit();
        }
    }

    $sql_ubah = "UPDATE tb_proker SET
        nama_proker='$nama_proker',
        tgl_pelaksana='$tgl_pelaksana',
        status='$status',
        id_pj='$id_pj',
        keterangan='$keterangan',
        upload_rab='$upload_rab'
        WHERE id_proker='" . mysqli_real_escape_string($koneksi, $_POST['id_proker']) . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-proker';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-proker';
            }
        });
        </script>";
    }
}
?>
