<?php
// Pastikan koneksi ke database sudah dibuat sebelumnya
 include "koneksi.php";

// Periksa apakah parameter 'kode' ada dalam URL dan valid
if (isset($_GET['kode'])) {
    $id_kdr = mysqli_real_escape_string($koneksi, $_GET['kode']);
    echo "<p>Parameter kode: " . htmlspecialchars($id_kdr) . "</p>";
    
    // Query untuk mendapatkan data dari database
    $sql_cek = "SELECT * FROM tb_kdr WHERE id_kdr='$id_kdr'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if ($query_cek && mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    } else {
        echo "<p>Data tidak ditemukan.</p>";
        exit();
    }
} else {
    echo "<p>Parameter kode tidak ditemukan.</p>";
    exit();
}
?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Ketua Dewan Racana</h3>
                <div class="card-tools"></div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>ID KDR</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_kdr']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Nama</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['nama']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Jabatan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['jabatan']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Periode</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['periode']); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-kdr" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <center><h3 class="card-title">Foto KDR</h3></center>
                <div class="card-tools"></div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="foto/<?php echo htmlspecialchars($data_cek['foto']); ?>" width="280px" alt="Foto KDR" />
                </div>
                <h3 class="profile-username text-center">
                    <?php echo htmlspecialchars($data_cek['nama']); ?> - <?php echo htmlspecialchars($data_cek['jabatan']); ?>
                </h3>
            </div>
        </div>
    </div>
</div>
