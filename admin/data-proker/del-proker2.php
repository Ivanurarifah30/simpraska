<?php
session_start(); // Mulai session
include 'koneksi.php'; // Pastikan path ini benar dan file koneksi.php sudah di-include

if(isset($_GET['kode'])){
    $id_proker = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_proker WHERE id_proker='$id_proker'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if ($query_cek) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
        if ($data_cek) {
            $file = $data_cek['upload_rab']; // Ganti 'file' dengan 'upload_rab'
            $file_path = "file/$file"; // Path lengkap file

            if (file_exists($file_path)) {
                if (unlink($file_path)) { // Pastikan file berhasil dihapus
                    $sql_hapus = "DELETE FROM tb_proker WHERE id_proker='$id_proker'";
                    $query_hapus = mysqli_query($koneksi, $sql_hapus);
                    if ($query_hapus) {
                        echo "<script>
                        Swal.fire({
                            title: 'Hapus Data Berhasil', 
                            text: '', 
                            icon: 'success', 
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'dashboard.php?page=data-proker2';
                            }
                        });
                        </script>";
                    } else {
                        echo "<script>
                        Swal.fire({
                            title: 'Hapus Data Gagal', 
                            text: '', 
                            icon: 'error', 
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'dashboard.php?page=data-proker2';
                            }
                        });
                        </script>";
                    }
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Gagal Menghapus File', 
                        text: '', 
                        icon: 'error', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=data-proker2';
                        }
                    });
                    </script>";
                }
            } else {
                $sql_hapus = "DELETE FROM tb_proker WHERE id_proker='$id_proker'";
                $query_hapus = mysqli_query($koneksi, $sql_hapus);
                if ($query_hapus) {
                    echo "<script>
                    Swal.fire({
                        title: 'Hapus Data Berhasil', 
                        text: '', 
                        icon: 'success', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=data-proker2';
                        }
                    });
                    </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Hapus Data Gagal', 
                        text: '', 
                        icon: 'error', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=data-proker2';
                        }
                    });
                    </script>";
                }
            }
        } else {
            echo "<script>
            Swal.fire({
                title: 'Data Tidak Ditemukan', 
                text: '', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=data-proker2';
                }
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Query Gagal', 
            text: '', 
            icon: 'error', 
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-proker2';
            }
        });
        </script>";
    }
}
?>
