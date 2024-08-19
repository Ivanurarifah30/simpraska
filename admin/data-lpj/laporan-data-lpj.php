<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data LPJ</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</head>
<body>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Laporan Data LPJ
        </h3>
    </div>

    <?php
    // Load file koneksi.php
    include "koneksi.php";

    $query = "SELECT id_lpj, nama_kegiatan, tahun, kategori, keterangan FROM tb_lpj";
    $url_cetak = "admin/data-lpj/cetak.php";
    $label = "";
    ?>

    <div style="padding: 15px;">
        <form method="POST">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <!-- Anda bisa menambahkan elemen form di sini jika diperlukan -->
                    </div>
                </div>
            </div>
        </form>
        <div>
            <h6 style="margin-left: auto;"><b>Laporan Data LPJ</b>
                <?php echo $label ?>
            </h6>
            <a href="<?php echo $url_cetak ?>">
                <button class="btn btn-success">Cetak PDF</button>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="table-responsive" style="margin-top: auto;">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: #343A40; color: aliceblue;">
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>    
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";        
                                echo "<td>" . $data['nama_kegiatan'] . "</td>";        
                                echo "<td>" . $data['tahun'] . "</td>";
                                echo "<td>" . $data['kategori'] . "</td>";
                                echo "<td>" . $data['keterangan'] . "</td>";
                                echo "</tr>";
                            }
                        } else { // Jika data tidak ada
                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <!-- Optional: Add footer rows if needed -->
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            setDateRangePicker(".tgl_awal", ".tgl_akhir")
        });
    </script>
</body>
</html>
