<?php
// Simulasi koneksi database
include ('koneksi.php'); // Pastikan file koneksi database sudah ada

// Mengatur filter status
$status_filter = '';
if (isset($_GET['status'])) {
    $status_filter = $_GET['status'];
}

// Query SQL untuk mendapatkan data anggota berdasarkan filter status
if ($status_filter == 'Direncanakan') {
    $sql = $koneksi->query("SELECT * FROM tb_proker WHERE status='Direncanakan'");
} elseif ($status_filter == 'Berlangsung') {
    $sql = $koneksi->query("SELECT * FROM tb_proker WHERE status='Berlangsung'");
} elseif ($status_filter == 'Selesai') {
    $sql = $koneksi->query("SELECT * FROM tb_proker WHERE status='Selesai'");
} else {
    $sql = $koneksi->query("SELECT * FROM tb_proker");
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Program Kerja
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <a href="?page=add-proker" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == '' || $status_filter == 'semua') echo 'active'; ?>" id="semua-tab" href="?page=data-proker&status=semua" role="tab" aria-controls="semua" aria-selected="<?php echo ($status_filter == '' || $status_filter == 'semua') ? 'true' : 'false'; ?>">
                        <i class="fa fa-users"></i> Semua Data Proker
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == 'Direncanakan') echo 'active'; ?>" id="Direncanakan-tab" href="?page=data-proker2&status=Direncanakan" role="tab" aria-controls="Direncanakan" aria-selected="<?php echo ($status_filter == 'Direncanakan') ? 'true' : 'false'; ?>">
                        <i class="fa fa-calendar"></i> Proker Direncanakan
                    </a>
                </li>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == 'Berlangsung') echo 'active'; ?>" id="Berlangsung-tab" href="?page=data-proker2&status=Berlangsung" role="tab" aria-controls="Berlangsung" aria-selected="<?php echo ($status_filter == 'Berlangsung') ? 'true' : 'false'; ?>">
                        <i class="fa fa-spinner fa-spin"></i> Proker Berlangsung
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if ($status_filter == 'Selesai') echo 'active'; ?>" id="Selesai-tab" href="?page=data-proker2&status=Selesai" role="tab" aria-controls="Selesai" aria-selected="<?php echo ($status_filter == 'Selesai') ? 'true' : 'false'; ?>">
                        <i class="fa fa-check"></i> Proker Selesai
                    </a>
                </li>
            </ul>
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Proker</th>
                        <th>Tgl Ditetapkan</th>           
                        <th>Status</th>
                        <th>ID PJ</th>
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
                            <td><?php echo htmlspecialchars($data['nama_proker']); ?></td>
                            <td><?php echo htmlspecialchars($data['tgl_ditetapkan']); ?></td>   
                            <td><?php echo htmlspecialchars($data['status']); ?></td>  
                            <td><?php echo htmlspecialchars($data['id_pj']); ?></td>      
                            <td>
                                <a href="?page=view-proker2&kode=<?php echo htmlspecialchars($data['id_proker']); ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="?page=edit-proker2&kode=<?php echo htmlspecialchars($data['id_proker']); ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-proker2&kode=<?php echo htmlspecialchars($data['id_proker']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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









