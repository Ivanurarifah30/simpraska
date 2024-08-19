<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Laporan Program Kerja
        </h3>
    </div>

    <?php
    // Load file koneksi.php
    include "koneksi.php";

    // Query SQL yang benar untuk memilih semua kolom yang diperlukan
    $query = "SELECT id_proker, nama_proker, tgl_ditetapkan, status, id_pj, keterangan FROM tb_proker";
    $url_cetak = "admin/data-proker/cetak.php";
    $label = "";
    ?>

    <div style="padding: 15px;">
        <form method="POST">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <!-- Form Filter dapat ditambahkan di sini jika diperlukan -->
                    </div>
                </div>
            </div>
        </form>

        <div>
            <h6><b>Laporan Program Kerja</b> <?php echo $label ?></h6>
            <a href="<?php echo $url_cetak ?>">
                <button class="btn btn-success">Cetak PDF</button>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: #343A40; color: aliceblue;">
                            <th>No</th>
                            <th>Nama Proker</th>
                            <th>Tgl Ditetapkan</th>
                            <th>Status</th>
                            <th>ID PJ</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                        if ($sql && mysqli_num_rows($sql) > 0) { // Jika data ada
                            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";    
                                echo "<td>" . htmlspecialchars($data['nama_proker']) . "</td>";        
                                echo "<td>" . htmlspecialchars($data['tgl_ditetapkan']) . "</td>";
                                echo "<td>" . htmlspecialchars($data['status']) . "</td>";
                                echo "<td>" . htmlspecialchars($data['id_pj']) . "</td>";
                                echo "<td>" . htmlspecialchars($data['keterangan']) . "</td>";
                                echo "</tr>";
                            }
                        } else { // Jika data tidak ada
                            echo "<tr><td colspan='6' style='text-align: center;'>Data tidak ada</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
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
                setDateRangePicker(".tgl_awal", ".tgl_akhir");
            });
        </script>
    </div>
</div>
