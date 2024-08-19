<?php
// Simulasi koneksi database
include ('koneksi.php'); // Pastikan file koneksi database sudah ada

// Mengatur filter status
$status_filter = '';
if (isset($_GET['status'])) {
    $status_filter = $_GET['status'];
}

// Query SQL untuk mendapatkan data anggota berdasarkan filter status
if ($status_filter == 'aktif') {
    $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE status='aktif'");
} elseif ($status_filter == 'tidak_aktif') {
    $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE status='tidak aktif'");
} else {
    $sql = $koneksi->query("SELECT * FROM tb_anggota");
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Anggota Racana
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == '' || $status_filter == 'semua') echo 'active'; ?>" id="semua-tab" href="?page=data-anggota&status=semua" role="tab" aria-controls="semua" aria-selected="<?php echo ($status_filter == '' || $status_filter == 'semua') ? 'true' : 'false'; ?>">
                        <i class="fa fa-users"></i> Semua Data Anggota
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == 'aktif') echo 'active'; ?>" id="aktif-tab" href="?page=data-anggota&status=aktif" role="tab" aria-controls="aktif" aria-selected="<?php echo ($status_filter == 'aktif') ? 'true' : 'false'; ?>">
                        <i class="fa fa-check"></i> Anggota Aktif
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == 'tidak_aktif') echo 'active'; ?>" id="tidak-aktif-tab" href="?page=data-anggota&status=tidak_aktif" role="tab" aria-controls="tidak-aktif" aria-selected="<?php echo ($status_filter == 'tidak_aktif') ? 'true' : 'false'; ?>">
                        <i class="fa fa-times"></i> Anggota Tidak Aktif
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tambah-tab" href="?page=add-anggota" role="tab" aria-controls="tambah" aria-selected="false">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="export-tab" href="admin/data-anggota/export_excel.php" role="tab" aria-controls="export" aria-selected="false">
                        <i class="fa fa-file-excel"></i> Export to Excel
                    </a>
                </li>
            </ul>
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>NAR</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>No Telp</th>
                        <th>Status</th>
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
                            <td><?php echo htmlspecialchars($data['nar']); ?></td>
                            <td><?php echo htmlspecialchars($data['nama']); ?></td>   
                            <td><?php echo htmlspecialchars($data['npm']); ?></td>
                            <td><?php echo htmlspecialchars($data['fakultas']); ?></td>
                            <td><?php echo htmlspecialchars($data['jurusan']); ?></td>
                            <td><?php echo htmlspecialchars($data['no_telp']); ?></td>
                            <td><?php echo htmlspecialchars($data['status']); ?></td>
                           
                            <td>
                                <a href="?page=view-anggota&kode=<?php echo htmlspecialchars($data['id_anggota']); ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="?page=edit-anggota&kode=<?php echo htmlspecialchars($data['id_anggota']); ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-anggota&kode=<?php echo htmlspecialchars($data['id_anggota']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
