<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_kas' => '',
    'tgl_transaksi' => '',
    'jenis_transaksi' => '',
    'keterangan' => '',
    'jumlah' => '',
    'saldo' => '',
    'id_anggota' => '',
    'upload_bukti' => ''
];

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_danakas WHERE id_kas='" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";
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
            $query = mysqli_query($koneksi, "SELECT max(id_kas) as kodeTerbesar FROM tb_danakas");
            $data = mysqli_fetch_array($query);
            $id_kas = $data['kodeTerbesar'];

            $urutan = (int) substr($id_kas, 3, 3);
            $urutan++;

            $huruf = "P";
            $id_kas = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Kas</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_kas" name="id_kas" value="<?php echo htmlspecialchars($data_cek['id_kas']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo htmlspecialchars($data_cek['tgl_transaksi']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Transaksi</label>
                <div class="col-sm-5">
                    <select name="jenis_transaksi" id="jenis_transaksi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Pemasukan" <?php if ($data_cek['jenis_transaksi'] == "Pemasukan") echo "selected"; ?>>Pemasukan</option>
                        <option value="Pengeluaran" <?php if ($data_cek['jenis_transaksi'] == "Pengeluaran") echo "selected"; ?>>Pengeluaran</option>
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
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" value="<?php echo htmlspecialchars($data_cek['jumlah']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Saldo</label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" id="saldo" name="saldo" value="<?php echo htmlspecialchars($data_cek['saldo']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Anggota</label>
                <div class="col-sm-5">
                    <select name="id_anggota" id="id_anggota" class="form-control" required>
                        <option value="">- Pilih Anggota -</option>
                        <?php
                        // Ambil data anggota dari database untuk dropdown
                        $anggota_query = mysqli_query($koneksi, "SELECT id_anggota, nama_anggota FROM tb_anggota");
                        while ($row = mysqli_fetch_assoc($anggota_query)) {
                            echo "<option value='".$row['id_anggota']."'>".$row['nama_anggota']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bukti</label>
                <div class="col-sm-6">
                    <img src="upload_bukti/<?php echo htmlspecialchars($data_cek['upload_bukti']); ?>" width="160px" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah Bukti</label>
                <div class="col-sm-5">
                    <input type="file" id="upload_bukti" name="upload_bukti">
                    <p class="help-block">
                        <font color="red">"Bukti Nota/Kwitansi"</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=danakas" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $tgl_transaksi = mysqli_real_escape_string($koneksi, $_POST['tgl_transaksi']);
    $jenis_transaksi = mysqli_real_escape_string($koneksi, $_POST['jenis_transaksi']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
    $saldo = mysqli_real_escape_string($koneksi, $_POST['saldo']);
    $id_anggota = mysqli_real_escape_string($koneksi, $_POST['id_anggota']);
    
    $sumber = @$_FILES['upload_bukti']['tmp_name'];
    $target = 'upload_bukti/';
    $upload_bukti = @$_FILES['upload_bukti']['name'];

    if (!empty($sumber)) {
        $foto = $data_cek['upload_bukti'];
        if (file_exists("upload_bukti/$foto")) {
            unlink("upload_bukti/$foto");
        }

        move_uploaded_file($sumber, $target . $upload_bukti);

        $sql_ubah = "UPDATE tb_danakas SET
            tgl_transaksi='$tgl_transaksi',
            jenis_transaksi='$jenis_transaksi',
            keterangan='$keterangan',
            jumlah='$jumlah',
            saldo='$saldo',
            id_anggota='$id_anggota',
            upload_bukti='$upload_bukti'
            WHERE id_kas='" . mysqli_real_escape_string($koneksi, $_POST['id_kas']) . "'";
    } else {
        $sql_ubah = "UPDATE tb_danakas SET
            tgl_transaksi='$tgl_transaksi',
            jenis_transaksi='$jenis_transaksi',
            keterangan='$keterangan',
            jumlah='$jumlah',
            saldo='$saldo',
            id_anggota='$id_anggota'
            WHERE id_kas='" . mysqli_real_escape_string($koneksi, $_POST['id_kas']) . "'";
    }
    
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=danakas2';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=danakas2';
            }
        });
        </script>";
    }
}
?>
