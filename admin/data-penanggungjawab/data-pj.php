<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Penanggungjawab
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-pj" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID PJ</>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tb_penanggungjawab");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($data['id_pj']); ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['jabatan']); ?></td>
                        <td>
                            <a href="?page=view-pj&kode=<?php echo urlencode($data['id_pj']); ?>" title="Detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="?page=edit-pj&kode=<?php echo urlencode($data['id_pj']); ?>" title="Ubah" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-pj&kode=<?php echo urlencode($data['id_pj']); ?>" onclick="return confirm('Apakah Anda yakin hapus data ini?')" title="Hapus" class="btn btn-danger btn-sm">
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
