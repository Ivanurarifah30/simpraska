<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Input Data Kas
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <?php
            include 'koneksi.php';

            // Mengambil ID kas terbesar dan membuat ID baru
            $query = mysqli_query($koneksi, "SELECT max(id_kas) as kodeTerbesar FROM tb_danakas");
            $data = mysqli_fetch_array($query);
            $id_kas = $data['kodeTerbesar'];
            $urutan = (int) substr($id_kas, 1, 3) + 1;
            $huruf = "P";
            $id_kas = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Kas</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_kas" name="id_kas" placeholder="ID Kas" required value="<?php echo htmlspecialchars($id_kas); ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tgl Transaksi</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Transaksi</label>
                <div class="col-sm-5">
                    <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
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
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Saldo</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="saldo" name="saldo" placeholder="Saldo" readonly>
                </div>
            </div>

        
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=danakas" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    $id_kas = mysqli_real_escape_string($koneksi, $_POST['id_kas']);
    $tgl_transaksi = mysqli_real_escape_string($koneksi, $_POST['tgl_transaksi']);
    $jenis_transaksi = mysqli_real_escape_string($koneksi, $_POST['jenis_transaksi']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);

    // Mengambil saldo terakhir
    $query_saldo = mysqli_query($koneksi, "SELECT saldo FROM tb_danakas ORDER BY id_kas DESC LIMIT 1");
    $data_saldo = mysqli_fetch_array($query_saldo);
    $saldo_sekarang = $data_saldo ? $data_saldo['saldo'] : 0;

    // Menghitung saldo baru
    if ($jenis_transaksi == 'Pemasukan') {
        $saldo_baru = $saldo_sekarang + $jumlah;
    } elseif ($jenis_transaksi == 'Pengeluaran') {
        $saldo_baru = $saldo_sekarang - $jumlah;
    }

    // Proses penyimpanan data ke database
    $sql_simpan = "INSERT INTO tb_danakas (id_kas, tgl_transaksi, jenis_transaksi, keterangan, jumlah, saldo) 
                   VALUES ('$id_kas', '$tgl_transaksi', '$jenis_transaksi', '$keterangan', '$jumlah', '$saldo_baru')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    if ($query_simpan) {
        $redirect_page = $_SESSION['ses_status'] == 'Anggota' ? 'danakas2' : 'danakas';
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=$redirect_page';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Gagal',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=add-danakas';
                }
            });
        </script>";
    }
}
?>
