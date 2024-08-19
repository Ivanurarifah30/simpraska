<?php
// Simulasi koneksi database
include('koneksi.php'); // Pastikan file koneksi database sudah ada

// Mengatur filter jabatan
$jabatan_filter = '';
if (isset($_GET['jabatan'])) {
    $jabatan_filter = htmlspecialchars($_GET['jabatan']);
}

// Query SQL untuk mendapatkan data anggota berdasarkan filter jabatan
if ($jabatan_filter == 'KDR Putra') {
    $sql = $koneksi->query("SELECT * FROM tb_kdr WHERE jabatan='KDR Putra'");
} elseif ($jabatan_filter == 'KDR Putri') {
    $sql = $koneksi->query("SELECT * FROM tb_kdr WHERE jabatan='KDR Putri'");
} else {
    $sql = $koneksi->query("SELECT * FROM tb_kdr");
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Ketua Dewan Racana
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($jabatan_filter == '' || $jabatan_filter == 'semua') echo 'active'; ?>" id="semua-tab" href="?page=data-kdr2&jabatan=semua" role="tab" aria-controls="semua" aria-selected="<?php echo ($jabatan_filter == '' || $jabatan_filter == 'semua') ? 'true' : 'false'; ?>">
                        <i class="fa fa-users"></i> Semua Data KDR
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($jabatan_filter == 'KDR Putra') echo 'active'; ?>" id="KDR-Putra-tab" href="?page=data-kdr2&jabatan=KDR Putra" role="tab" aria-controls="KDR Putra" aria-selected="<?php echo ($jabatan_filter == 'KDR Putra') ? 'true' : 'false'; ?>">
                        <i class="fa fa-check"></i> KDR Putra
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($jabatan_filter == 'KDR Putri') echo 'active'; ?>" id="KDR-Putri-tab" href="?page=data-kdr2&jabatan=KDR Putri" role="tab" aria-controls="KDR Putri" aria-selected="<?php echo ($jabatan_filter == 'KDR Putri') ? 'true' : 'false'; ?>">
                        <i class="fa fa-check"></i> KDR Putri
                    </a>
                </li>
            </ul>
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
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
                            <td><?php echo htmlspecialchars($data['id_anggota']); ?></td>
                            <td><?php echo htmlspecialchars($data['nama']); ?></td>
                            <td><?php echo htmlspecialchars($data['jabatan']); ?></td>
                            <td><?php echo htmlspecialchars($data['periode']); ?></td>
                            <td>
                                <a href="?page=view-kdr2&kode=<?php echo htmlspecialchars($data['id_kdr']); ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
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
