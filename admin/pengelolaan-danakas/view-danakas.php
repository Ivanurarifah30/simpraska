<?php
// Sertakan file koneksi
require_once 'koneksi.php'; // Pastikan path ke file koneksi benar

$data_cek = null; // Inisialisasi variabel $data_cek

// Memeriksa apakah parameter 'kode' ada di dalam URL
if (isset($_GET['kode'])) {
    // Menggunakan mysqli_real_escape_string untuk mencegah SQL Injection
    $id_kas = mysqli_real_escape_string($koneksi, $_GET['kode']);

    // Menjalankan query untuk mengambil data kas berdasarkan id_kas
    $sql_cek = "SELECT * FROM tb_danakas WHERE id_kas = '$id_kas'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    // Memeriksa apakah data kas ditemukan
    if (mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    } else {
        echo "<script>alert('Data tidak ditemukan.'); window.location.href='?page=danakas';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID kas tidak ditemukan.'); window.location.href='?page=danakas';</script>";
    exit;
}
?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Pengelolaan Keuangan</h3>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>ID Kas</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_kas']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Tanggal Transaksi</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['tgl_transaksi']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Jenis Transaksi</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['jenis_transaksi']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Keterangan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['keterangan']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Jumlah</b></td>
                            <td>: <?php echo number_format($data_cek['jumlah'], 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Saldo</b></td>
                            <td>: <?php echo number_format($data_cek['saldo'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=danakas" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
