<?php
// Sertakan file koneksi
require_once 'koneksi.php'; // Pastikan path ke file koneksi benar


$data_cek = null; // Inisialisasi variabel $data_cek

// Memeriksa apakah parameter 'id_anggota' ada di dalam URL
if (isset($_GET['kode'])) {
    // Menggunakan mysqli_real_escape_string untuk mencegah SQL Injection
    $id_anggota = mysqli_real_escape_string($koneksi, $_GET['kode']);

    // Menjalankan query untuk mengambil data anggota berdasarkan id_anggota
    $sql_cek = "SELECT * FROM tb_anggota WHERE id_anggota = '$id_anggota'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    // Memeriksa apakah data anggota ditemukan
    if (mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Anggota tidak ditemukan.$id_anggota";
    exit;
}
?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail Anggota</h3>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>ID Anggota</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_anggota']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>NAR</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['nar']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Nama</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['nama']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>TTL</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['ttl']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Alamat</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['alamat']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>NPM</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['npm']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Fakultas</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['fakultas']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Jurusan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['jurusan']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>No Telp</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['no_telp']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Status</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['status']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Keterangan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['keterangan']); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-anggota2" class="btn btn-warning">Kembali</a>  
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <center>
                    <h3 class="card-title">Foto Anggota</h3>
                </center>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="foto/<?php echo htmlspecialchars($data_cek['foto']); ?>" width="280px" />
                </div>
                <h3 class="profile-username text-center">
                    <?php echo htmlspecialchars($data_cek['nama']); ?> 
                <h3 class="profile-username text-center">
                    <?php echo htmlspecialchars($data_cek['nar']); ?> 
                 
                </h3>
            </div>
        </div>
    </div>
</div>