<?php
include 'koneksi.php';

if (isset($_GET['kode'])) {
    $id_lpj = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_lpj WHERE id_lpj='$id_lpj'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if ($query_cek) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC);
    } else {
        echo "<p>Terjadi kesalahan saat mengambil data dari database.</p>";
        $data_cek = null;
    }
} else {
    echo "<p>Parameter 'kode' tidak ditemukan.</p>";
    $data_cek = null;
}
?>
<div class="row">

    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Data Laporan Pertanggungjawaban</h3>
                <div class="card-tools"></div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                    <?php if ($data_cek): ?>
                        <tr>
                            <td style="width: 150px"><b>ID LPJ</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_lpj']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Nama Kegiatan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['nama_kegiatan']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Tahun</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['tahun']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Kategori</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['kategori']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Keterangan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['keterangan']); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Data tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-lpj2" class="btn btn-warning">Kembali</a>
                    <?php if ($data_cek): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <center>
                    <h3 class="card-title">Upload File</h3>
                </center>
                <div class="card-tools"></div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <?php if (!empty($data_cek['upload_lpj'])): ?>
                        <a href="file/<?php echo htmlspecialchars($data_cek['upload_lpj']); ?>" target="_blank">Lihat File</a>
                    <?php else: ?>
                        <p>File LPJ tidak tersedia</p>
                    <?php endif; ?>
                </div>
                <?php if ($data_cek): ?>
                    <h3 class="profile-username text-center">
                        <?php echo htmlspecialchars($data_cek['nama_kegiatan']); ?>
                    </h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
