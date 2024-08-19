<?php
// Simulasi koneksi database
include('koneksi.php'); // Pastikan file koneksi database sudah ada

// Query untuk mengambil data dari tabel kas_organisasi
$query = "SELECT * FROM tb_danakas";
$sql = $koneksi->query($query);

if (!$sql) {
    die("Query gagal: " . $koneksi->error);
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Pengelolaan Dana Kas 
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tambah-tab" href="?page=add-danakas" role="tab" aria-controls="tambah" aria-selected="false">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="export-tab" href="admin/pengelolaan-danakas/export_excel.php" role="tab" aria-controls="export" aria-selected="false">
                        <i class="fa fa-file-excel"></i> Export to Excel
                    </a>
                </li>
            </ul>
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tgl Transaksi</th>
                        <th>Jenis Transaksi</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Saldo</th>
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
                            <td><?php echo htmlspecialchars($data['tgl_transaksi']); ?></td>
                            <td><?php echo htmlspecialchars($data['jenis_transaksi']); ?></td>   
                            <td><?php echo htmlspecialchars($data['keterangan']); ?></td>
                            <td><?php echo number_format($data['jumlah'], 2, ',', '.'); ?></td>
                            <td><?php echo number_format($data['saldo'], 2, ',', '.'); ?></td> 
                            <td>
                                <a href="?page=view-danakas&kode=<?php echo htmlspecialchars($data['id_kas']); ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="?page=edit-danakas&kode=<?php echo htmlspecialchars($data['id_kas']); ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-danakas&kode=<?php echo htmlspecialchars($data['id_kas']); ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
