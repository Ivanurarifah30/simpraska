<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Laporan Anggota
        </h3>
    </div>

    <?php
    include "koneksi.php";

    // Default SQL query
    $query = "SELECT id_anggota, nar, nama, ttl, alamat, npm, fakultas, jurusan, no_telp, status, keterangan FROM tb_anggota";

    // Check if filter status is set
    if (isset($_POST['status']) && $_POST['status'] != 'semua') {
        $status = $_POST['status'];
        $query .= " WHERE status = '$status'";
        $label = "Status: " . ucfirst($status);
    } else {
        $label = "Semua Status";
    }

    $url_cetak = "admin/data-anggota/cetak.php?status=" . (isset($status) ? $status : 'semua');
    ?>

    <div style="padding: 15px;">
        <form method="POST">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label for="status">Filter Status Anggota:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="semua">Semua</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>&nbsp;</label><br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div>
                </div>
            </div>
        </form>
        <div>
            <h6 style="margin-left: auto;"><b>Laporan Anggota</b> <?php echo $label ?></h6>
            <a href="<?php echo $url_cetak ?>" target="_blank">
                <button class="btn btn-success">Cetak PDF</button>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="table-responsive" style="margin-top: auto;">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>NAR</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>NPM</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>No Telp</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, $query);
                        $row = mysqli_num_rows($sql);
                        if ($row > 0) {
                            while ($data = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $data['id_anggota'] . "</td>";
                                echo "<td>" . $data['nar'] . "</td>";
                                echo "<td>" . $data['nama'] . "</td>";
                                echo "<td>" . $data['ttl'] . "</td>";
                                echo "<td>" . $data['alamat'] . "</td>";
                                echo "<td>" . $data['npm'] . "</td>";
                                echo "<td>" . $data['fakultas'] . "</td>";
                                echo "<td>" . $data['jurusan'] . "</td>";
                                echo "<td>" . $data['no_telp'] . "</td>";
                                echo "<td>" . $data['status'] . "</td>";
                                echo "<td>" . $data['keterangan'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>Data tidak ada</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include File JS Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Include library Bootstrap Datepicker -->
    <script src="../assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="../assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            setDateRangePicker(".tgl_awal", ".tgl_akhir")
        })
    </script>
</div>
