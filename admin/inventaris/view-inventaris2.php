<?php
if(isset($_GET['kode'])){
    include 'koneksi.php'; // Pastikan untuk menyertakan file koneksi

    $sql_cek = "SELECT * FROM tb_inventaris WHERE id_barang='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek) or die(mysqli_error($koneksi));
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    // Debugging: Uncomment line below to see the fetched data
    // var_dump($data_cek);
}
?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Inventaris Kabag Racana</h3>
            </div>
            <div class="card-body p-0">
                <?php if($data_cek): ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>ID</b></td>
                            <td>: <?php echo $data_cek['id_barang']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Nama Barang</b></td>
                            <td>: <?php echo $data_cek['nama_barang']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Jumlah</b></td>
                            <td>: <?php echo $data_cek['jumlah']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Kondisi</b></td>
                            <td>: <?php echo $data_cek['kondisi']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Keterangan</b></td>
                            <td>: <?php echo $data_cek['keterangan']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Tgl Pengecekan</b></td>
                            <td>: <?php echo $data_cek['tgl_pengecekan']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php else: ?>
                <p>Data tidak ditemukan.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <a href="?page=inventaris2" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <center>
                    <h3 class="card-title">Foto Barang</h3>
                </center>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="foto/<?php echo htmlspecialchars($data_cek['foto']); ?>" width="280px" />
                </div>
                <h3 class="profile-username text-center">
                 <?php echo htmlspecialchars($data_cek['nama_barang']); ?>    
    </div>
</div>
