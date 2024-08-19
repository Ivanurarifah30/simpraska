<?php
// Simulasi koneksi database
include('koneksi.php'); // Pastikan file koneksi database sudah ada

// Fetch data pengguna dari database
$no = 1;
$sql = $koneksi->query("SELECT * FROM tb_pengguna");
?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data User
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-pengguna" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr style="background-color:#343A40; color:aliceblue;">
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data pengguna
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($data['nama_lengkap']); ?></td>
                            <td><?php echo htmlspecialchars($data['username']); ?></td>
                            <td><?php echo htmlspecialchars($data['status']); ?></td>
                            <td>
                                <a href="?page=edit-pengguna&kode=<?php echo urlencode($data['id_pengguna']); ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-pengguna&kode=<?php echo urlencode($data['id_pengguna']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
