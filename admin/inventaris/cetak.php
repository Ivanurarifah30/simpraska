<?php ob_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th, .table td {
            padding: 5px;
            border: 1px solid black;
        }

        .table td {
            word-wrap: break-word;
            width: 20%;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "koneksi.php";
  
    $query = "SELECT  nama_barang, jumlah, kondisi, keterangan, tgl_pengecekan FROM tb_inventaris";
    ?>

    <img src="../assets/images/uniska.png" align="left" height="120" width="120">
    <img src="../assets/images/pramuka.png" align="right" height="120" width="120">

    <h2 style="text-align:center; margin-top: 20px;">DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI</h2>
    <h2 style="text-align:center; margin-top: 20px;">GERAKAN PRAMUKA GUGUS DEPAN 02.375 – 02.376</h2>
    <h2 style="text-align:center; margin-top: 20px;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN</h2>

    <h3 style="text-align:center; margin-top: 20px;">Sekretariat: Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN INVENTARIS KABAG PRAMUKA UNISKA</h3>
  
    <hr>
    <table class="table" align="center" width="670">
        <tr>
            <th width="30">No</th>
            <th width="200">Nama Barang</th>
            <th width="50">Jumlah</th>
            <th width="100">Kondisi</th>
            <th width="100">Keterangan</th>
            <th width="150">Tgl Pengecekan</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi query
        if ($sql) {
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";  
                echo "<td>" . $data['nama_barang'] . "</td>";
                echo "<td>" . $data['jumlah'] . "</td>";
                echo "<td>" . $data['kondisi'] . "</td>";
                echo "<td>" . $data['keterangan'] . "</td>";
                echo "<td>" . $data['tgl_pengecekan'] . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
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
            <td align="center"><u>Muhammad Jayadi</u><br>NAR.</td>
        </tr>
    </table>
    
    <script>
        window.print();
    </script>
</body>

</html>

<?php
// End of the script
ob_end_flush();
?>
