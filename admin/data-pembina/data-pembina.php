<?php
// Simulasi koneksi database
include ('koneksi.php'); // Pastikan file koneksi database sudah ada

// Mengatur filter status
$status_filter = '';
if (isset($_GET['status'])) {
    $status_filter = $_GET['status'];
}

// Query SQL untuk mendapatkan data anggota berdasarkan filter status
$sql = "SELECT * FROM tb_pembina";
if ($status_filter) {
    $sql .= " WHERE status='" . $status_filter . "'";
}
$result = $koneksi->query($sql);
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Majelis Pembimbing dan Pembina Pramuka
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-pembina" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
                <a href="?page=data-pembina" class="btn btn-info">
                    <i class="fa fa-edit"></i> Semua Pembina
                </a>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php if ($status_filter == 'Majelis Pembimbing Gugusdepan') echo 'active'; ?>" id="Majelis-Pembimbing-Gugusdepan-tab" href="?page=data-pembina&status=Majelis Pembimbing Gugusdepan" role="tab" aria-controls="Majelis Pembimbing Gugusdepan" aria-selected="<?php echo ($status_filter == 'Majelis Pembimbing Gugusdepan') ? 'true' : 'false'; ?>">
                            <i class="fa fa-check"></i> Majelis Pembimbing Gugusdepan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php if ($status_filter == 'Pembina Gugusdepan Putera') echo 'active'; ?>" id="Pembina-Gugusdepan-Putera-tab" href="?page=data-pembina&status=Pembina Gugusdepan Putera" role="tab" aria-controls="Pembina Gugusdepan Putera" aria-selected="<?php echo ($status_filter == 'Pembina Gugusdepan Putera') ? 'true' : 'false'; ?>">
                            <i class="fa fa-male"></i> Pembina Gugusdepan Putera
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php if ($status_filter == 'Pembina Gugusdepan Puteri') echo 'active'; ?>" id="Pembina-Gugusdepan-Puteri-tab" href="?page=data-pembina&status=Pembina Gugusdepan Puteri" role="tab" aria-controls="Pembina Gugusdepan Puteri" aria-selected="<?php echo ($status_filter == 'Pembina Gugusdepan Puteri') ? 'true' : 'false'; ?>">
                            <i class="fa fa-female"></i> Pembina Gugusdepan Puteri
                        </a>
                    </li>
                </ul>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jabatan</th>
                        <th>No Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nip']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td><?php echo $data['jabatan']; ?></td>
                            <td><?php echo $data['no_telp']; ?></td>
                            <td>
                                <a href="?page=view-pembina&kode=<?php echo $data['id_pembina']; ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="?page=edit-pembina&kode=<?php echo $data['id_pembina']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-pembina&kode=<?php echo $data['id_pembina']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
    <!-- /.card-body -->
</div>
