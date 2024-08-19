<?php
include 'koneksi.php'; // Pastikan path ini benar dan file koneksi.php sudah di-include

if (isset($_GET['kode'])) {
    $id_kas = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_danakas WHERE id_kas='$id_kas'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if ($query_cek) {
        if (mysqli_num_rows($query_cek) > 0) {
            // Jika data ditemukan, hapus data
            $sql_hapus = "DELETE FROM tb_danakas WHERE id_kas='$id_kas'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {if (result.value) {window.location = 'dashboard.php?page=danakas'
                ;}})</script>";
            } else {
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {if (result.value) {window.location = 'dashboard.php?page=danakas'
                ;}})</script>";
            }
        } else {
            // Jika data tidak ditemukan
            echo "<script>
            Swal.fire({title: 'Data Tidak Ditemukan', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {window.location = 'dashboard.php?page=danakas'
            ;}})</script>";
        }
    } else {
        // Jika query gagal
        echo "<script>
        Swal.fire({title: 'Query Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'dashboard.php?page=danakas'
        ;}})</script>";
    }
} else {
    // Jika ID kas tidak ditemukan di URL
    echo "<script>
    Swal.fire({title: 'ID Kas Tidak Ditemukan', text: '', icon: 'error', confirmButtonText: 'OK'
    }).then((result) => {if (result.value) {window.location = 'dashboard.php?page=danakas'
    ;}})</script>";
}
?>
