<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_proker WHERE id_proker='".mysqli_real_escape_string($koneksi, $_GET['kode'])."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    }
?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Data Program Kerja Pramuka Uniska</h3>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>ID Proker</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_proker']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Nama Proker</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['nama_proker']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Tgl Ditetapkan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['tgl_ditetapkan']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Status</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['status']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>ID Penanggungjawab</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['id_pj']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Keterangan</b></td>
                            <td>: <?php echo htmlspecialchars($data_cek['keterangan']); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-proker" class="btn btn-warning">Kembali</a>
                    </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <center>
                    <h3 class="card-title">Upload RAB</h3>
                </center>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <?php if (!empty($data_cek['upload_rab'])): ?>
                        <a href="file/<?php echo htmlspecialchars($data_cek['upload_rab']); ?>" target="_blank">Lihat File</a>
                    <?php else: ?>
                        <p>File RAB tidak tersedia</p>
                    <?php endif; ?>
                </div>
                <h3 class="profile-username text-center">
                    <?php echo htmlspecialchars($data_cek['nama_proker']); ?> - <?php echo htmlspecialchars($data_cek['tgl_ditetapkan']); ?>
                </h3>
            </div>
        </div>
    </div>
</div>
