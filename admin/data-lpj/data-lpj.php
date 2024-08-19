<?php
// Simulasi koneksi database
include('koneksi.php'); // Pastikan file koneksi database sudah ada

// Mengatur filter kategori
$kategori_filter = '';
if (isset($_GET['kategori'])) {
    $kategori_filter = $_GET['kategori'];
}

// Query SQL untuk mendapatkan data anggota berdasarkan filter kategori
if ($kategori_filter == 'LPJ_Kegiatan') {
    $sql = $koneksi->query("SELECT * FROM tb_lpj WHERE kategori='LPJ_Kegiatan'");
} elseif ($kategori_filter == 'LPJ_Pengurus') {
    $sql = $koneksi->query("SELECT * FROM tb_lpj WHERE kategori='LPJ_Pengurus'");
} else {
    $sql = $koneksi->query("SELECT * FROM tb_lpj");
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Laporan Pertanggungjawaban
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="?page=add-lpj" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php echo ($kategori_filter == '' || $kategori_filter == 'semua') ? 'active' : ''; ?>" id="semua-tab" href="?page=data-lpj&kategori=semua" role="tab" aria-controls="semua" aria-selected="<?php echo ($kategori_filter == '' || $kategori_filter == 'semua') ? 'true' : 'false'; ?>">
                        <i class="fa fa-users"></i> Semua Data LPJ
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php echo ($kategori_filter == 'LPJ_Kegiatan') ? 'active' : ''; ?>" id="LPJ_Kegiatan-tab" href="?page=data-lpj&kategori=LPJ_Kegiatan" role="tab" aria-controls="LPJ_Kegiatan" aria-selected="<?php echo ($kategori_filter == 'LPJ_Kegiatan') ? 'true' : 'false'; ?>">
                        <i class="fa fa-check"></i> LPJ Kegiatan
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php echo ($kategori_filter == 'LPJ_Pengurus') ? 'active' : ''; ?>" id="LPJ_Pengurus-tab" href="?page=data-lpj&kategori=LPJ_Pengurus" role="tab" aria-controls="LPJ_Pengurus" aria-selected="<?php echo ($kategori_filter == 'LPJ_Pengurus') ? 'true' : 'false'; ?>">
                        <i class="fa fa-check"></i> LPJ Pengurus
                    </a>
                </li>
            </ul>

            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($data['nama_kegiatan']); ?></td>
                            <td><?php echo htmlspecialchars($data['tahun']); ?></td>
                            <td><?php echo htmlspecialchars($data['kategori']); ?></td>
                            <td><?php echo htmlspecialchars($data['keterangan']); ?></td>
                            <td>
                                <a href="?page=view-lpj&kode=<?php echo htmlspecialchars($data['id_lpj']); ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="?page=edit-lpj&kode=<?php echo htmlspecialchars($data['id_lpj']); ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-lpj&kode=<?php echo htmlspecialchars($data['id_lpj']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
