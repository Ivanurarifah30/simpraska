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
            width: 100%;
        }

        .table th, .table td {
            padding: 3px;
            word-wrap: break-word;
            font-size: 9px;
            border: 1px solid #000;
        }

        .table th {
            background-color: #f2f2f2;
        }

        h2, h3 {
            margin-top: 5px;
            font-size: 14px;
            text-align: center;
        }

        hr {
            margin: 10px 0;
        }
    </style>

</head>
<body>
<img src="../assets/images/uniska.png" align="left" height="80" width="80">
    <img src="../assets/images/pramuka.png" align="right" height="80" width="80">

    <h2 style="text-align:center;">DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI</h2>
    <h2 style="text-align:center;">GERAKAN PRAMUKA GUGUS DEPAN 02.375 – 02.376</h2>
    <h2 style="text-align:center;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN</h2>

    <h3 style="text-align:center;">Sekretariat: Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    
    <hr>
    <h3>LAPORAN  LPJ</h3>  
    <hr>
    
    <table class="table" align="center" style="margin-top: 15px;">
        <tr>
            <th width="30">NO</th>
            <th width="145">Nama Kegiatan</th>
            <th width="70">Tahun</th>
            <th width="70">Kategori</th>
            <th width="100">Keterangan</th>
        </tr>
        <?php
        include 'koneksi.php'; // Pastikan koneksi ke database
        $query = "SELECT id_lpj, nama_kegiatan, tahun, kategori, keterangan FROM tb_lpj";
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0
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
// End output buffering and clean up
ob_end_flush();
?>
