<?php
// Pastikan koneksi database telah didefinisikan
include 'koneksi.php';

if (isset($_GET['kode'])) {
    $kode = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_penanggungjawab WHERE id_pj='$kode'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if ($query_cek) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC);

        // Menangani jika data tidak ditemukan
        if (!$data_cek) {
            echo "<script>alert('Data tidak ditemukan');window.location.href='?page=data-pj';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Query Error');window.location.href='?page=data-pj';</script>";
        exit;
    }
} else {
    echo "<script>alert('Kode tidak ada');window.location.href='?page=data-pj';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Penanggungjawab</title>
    <!-- Include your CSS and JS libraries here -->
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Data Penanggungjawab</h3>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>ID PJ</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_pj']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>ID Anggota</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_anggota']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>ID Pembina</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_pembina']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Nama</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['nama']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Jabatan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['jabatan']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="?page=data-pj" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
