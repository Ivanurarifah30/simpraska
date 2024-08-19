<?php ob_start(); ?>

<html>

<head>
    <title>Cetak PDF</title>
    <style>
        body {
            font-size: 10px;
            font-family: Arial, sans-serif;
        }

        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        .table th, .table td {
            padding: 3px;
            word-wrap: break-word;
            font-size: 9px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        h2, h3 {
            margin-top: 5px;
            font-size: 14px;
        }

        hr {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "koneksi.php";

    // Ambil status filter dari URL atau default ke 'semua'
    $status = isset($_GET['status']) ? $_GET['status'] : 'semua';

    // Sesuaikan query SQL berdasarkan filter status
    $query = "SELECT id_anggota, nar, nama, ttl, alamat, npm, fakultas, jurusan, no_telp, status, keterangan FROM tb_anggota";
    if ($status == 'aktif') {
        $query .= " WHERE status = 'aktif'";
    } elseif ($status == 'tidak aktif') {
        $query .= " WHERE status = 'tidak aktif'";
    }
    ?>
    
    <img src="../assets/images/uniska.png" align="left" height="80" width="80">
    <img src="../assets/images/pramuka.png" align="right" height="80" width="80">

    <h2 style="text-align:center;">DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI</h2>
    <h2 style="text-align:center;">GERAKAN PRAMUKA GUGUS DEPAN 02.375 – 02.376</h2>
    <h2 style="text-align:center;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN</h2>

    <h3 style="text-align:center;">Sekretariat: Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    
    <hr>
    <h3 style="text-align:center;">LAPORAN ANGGOTA</h3>  
    <hr>
    
    <table class="table" align="center" border="1" style="text-align:center;">
        <tr>
            <th width="30">NO</th>
            <th width="50">NAR</th>
            <th width="50">Nama</th>
            <th width="70">TTL</th>
            <th width="100">Alamat</th>
            <th width="50">NPM</th>
            <th width="50">Fakultas</th>
            <th width="70">Jurusan</th>
            <th width="50">No Telp</th>
            <th width="30">Status</th>
            <th width="50">Keterangan</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";		
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
        } else { // Jika data tidak ada
            echo "<tr><td colspan='11'>Data tidak ada</td></tr>";
        }
        ?>
    </table>

    <br /><br /><br />
    <table align="right" width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Banjarmasin, <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Ketua Dewan Racana<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Muhammad Jayadi</u><br> NAR. </td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>
<?php
ob_end_flush();
?>
