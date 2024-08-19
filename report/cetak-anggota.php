<?php
include "koneksi.php";

$id_anggota = $_GET['id_anggota'];

$sql_tampil = "SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'";
$query_tampil = mysqli_query($koneksi, $sql_tampil) or die(mysqli_error($koneksi));
$data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH);

if ($data) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CETAK DATA ANGGOTA</title>
    <style>
    @media print {
        .no-print {
            display: none;
        }
        /* Tambahkan aturan CSS tambahan jika diperlukan */
    }
    </style>
</head>
<body>
    <img src="admin/assets/images/uniska.png" align="left" height="120" width="120">
    <img src="admin/assets/images/pramuka.png" align="right" height="120" width="120">

    <h2 style="text-align:center; margin-top: 20px;">DEWAN RACANA PANGERAN SAMUDERA PUTERI MAYANG SARI</h2>
    <h2 style="text-align:center; margin-top: 20px;">GERAKAN PRAMUKA GUGUS DEPAN 02.375 – 02.376</h2>
    <h2 style="text-align:center; margin-top: 20px;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN</h2>

    <h3 style="text-align:center; margin-top: 20px;">Sekretariat: Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>
    <br><br>
    <hr size="2px" color="black">
    
    <center>
        <h4>
            <u>DATA ANGGOTA</u>
        </h4>
    </center>

    <table border="1" cellspacing="0" style="width: 90%" align="center">
        <tbody>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><?php echo $data['id_anggota']; ?></td>
                <td rowspan="15" align="center">
                    <img src="../foto/<?php echo $data['foto']; ?>" width="200px" />
                </td>
            </tr>
            <tr>
                <td>NAR</td>
                <td>:</td>
                <td><?php echo $data['nar']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <td>TTL</td>
                <td>:</td>
                <td><?php echo $data['ttl']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $data['alamat']; ?></td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td><?php echo $data['npm']; ?></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>:</td>
                <td><?php echo $data['fakultas']; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?php echo $data['jurusan']; ?></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td><?php echo $data['no_telp']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php echo $data['status']; ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?php echo $data['keterangan']; ?></td>
            </tr>
        </tbody>
    </table>

    <br><br><br>
    <table width="100%">
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
            <td align="center"><u>Muhammad Jayadi</u><br>NAR</td>
        </tr>
    </table>

    <script>
        window.print();
    </script>

</body>
</html>

<?php
    } else {
        echo "Data tidak ditemukan.";
    }
?>
