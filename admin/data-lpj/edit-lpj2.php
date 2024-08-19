<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_lpj' => '',
    'nama_kegiatan' => '',
    'tahun' => '',
    'kategori' => '',
    'keterangan' => '',
    'upload_file' => ''
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
            <?php
            $query = mysqli_query($koneksi, "SELECT max(id_lpj) as kodeTerbesar FROM tb_lpj");
            $data = mysqli_fetch_array($query);
            $id_lpj = $data['kodeTerbesar'];

            $urutan = (int) substr($id_lpj, 3, 3);
            $urutan++;

            $huruf = "P";
            $id_lpj = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID lpj</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_lpj" name="id_lpj" value="<?php echo htmlspecialchars($data_cek['id_lpj']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nana Kegiatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo htmlspecialchars($data_cek['nama_kegiatan']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">tahun</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo htmlspecialchars($data_cek['tahun']); ?>" />
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">kategori</label>
                <div class="col-sm-5">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="LPJ_Kegiatan" <?php if ($data_cek['kategori'] == "LPJ_Kegiatan") echo "selected"; ?>>LPJ_Kegiatan</option>
                        <option value="LPJ_Pengurus" <?php if ($data_cek['kategori'] == "LPJ_Pengurus") echo "selected"; ?>>LPJ_Pengurus</option>
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
                    <file src="file/<?php echo htmlspecialchars($data_cek['upload_file']); ?>" width="160px" />
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
    
    $sumber = @$_FILES['upload_file']['tmp_name'];
    $target = 'file/';
    $nama_file = @$_FILES['upload_file']['name'];
    $pindah = move_uploaded_file($sumber, $target . $nama_file);

    if (!empty($sumber)) {
        $upload_file = $data_cek['upload_file'];
        if (file_exists("upload_file/$upload_file")) {
            unlink("upload_file/$upload_file");
        }

        $sql_ubah = "UPDATE tb_lpj SET
            nama_kegiatan='$nama_kegiatan',
            tahun='$tahun',
            kategori='$kategori',
            keterangan='$keterangan',
            upload_file='$nama_file'
            WHERE id_lpj='" . mysqli_real_escape_string($koneksi, $_POST['id_lpj']) . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    } elseif (empty($sumber)) {
        $sql_ubah = "UPDATE tb_lpj SET
             nama_kegiatan='$nama_kegiatan',
            tahun='$tahun',
            kategori='$kategori',
            keterangan='$keterangan',
            upload_file='$nama_file'
            WHERE id_lpj='" . mysqli_real_escape_string($koneksi, $_POST['id_lpj']) . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-lpj2';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-lpj2';
            }
        });
        </script>";
    }
}
?>
