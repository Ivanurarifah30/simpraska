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

    // Query SQL yang benar untuk memilih semua kolom yang diperlukan
    $query = "SELECT nip, nama, status, jabatan, no_telp FROM tb_pembina";
    ?>

    <img src="../assets/images/uniska.png" align="left" height="120" width="120">
    <img src="../assets/images/pramuka.png" align="right" height="120" width="120">

    <h2 style="text-align:center; margin-top: 20px;"> DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI </h2>
    <h2 style="text-align:center; margin-top: 20px;"> GERAKAN PRAMUKA GUGUS DEPAN 02.375 – 02.376 </h2>
    <h2 style="text-align:center; margin-top: 20px;"> UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN </h2>

    <h3 style="text-align:center; margin-top: 20px;">Sekretariat : Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN PEMBINA</h3>  
    <hr>
    
    <table class="table" align="center" border="1" style="margin-top: 15px; text-align:center;">
        <tr>
            <th width="30">No</th>
            <th width="80">NIP</th>
            <th width="100">Nama</th>
            <th width="70">Status</th>
            <th width="50">Jabatan</th>
            <th width="50">No Telp</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";			
                echo "<td>" . $data['nip'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['status'] . "</td>";
                echo "<td>" . $data['jabatan'] . "</td>";
                echo "<td>" . $data['no_telp'] . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
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
            <td align="center">Ka Mabigus 02.375-02.376<br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><u>Prof.Ir.Abd.Malik,S.Pt.,M.Si., Ph,D, IPU, ASEAN Eng.</u><br> NIK. 060 105 197</td>
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
