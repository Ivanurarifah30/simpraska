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
  
    // Query untuk memilih data dari tb_proker
    $query = "SELECT id_proker, nama_proker, tgl_ditetapkan, status, id_pj, keterangan FROM tb_proker";
    ?>

    <img src="../assets/images/uniska.png" align="left" height="120" width="120">
    <img src="../assets/images/pramuka.png" align="right" height="120" width="120">

    <h2 style="text-align:center; margin-top: 20px;"> DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI </h2>
    <h2 style="text-align:center; margin-top: 20px;"> GERAKAN PRAMUKA GUGUS DEPAN 02.375 – 02.376 </h2>
    <h2 style="text-align:center; margin-top: 20px;"> UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN </h2>

    <h3 style="text-align:center; margin-top: 20px;">Sekretariat : Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN PROGRAM KERJA</h3>  
    <hr>
    
    <table class="table" align="center" width="700" border="1" style="margin-top: 15px; text-align:center;">
        <tr>
            <th width="30">No</th>
            <th width="100">Nama Proker</th>
            <th width="90">Tgl Ditetapkan</th>
            <th width="100">Status</th>
            <th width="50">ID PJ</th>
            <th width="100">Keterangan</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi query

        if ($sql && mysqli_num_rows($sql) > 0) { // Cek apakah ada data
            while ($data = mysqli_fetch_array($sql)) { // Ambil datanya
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
            echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
        }
        ?>
    </table>

    <br />
    <br />
    <br />
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
<?php ob_end_flush(); ?>
