<?php
include 'koneksi.php'; // Pastikan path ini benar dan file koneksi.php sudah di-include

if (isset($_GET['kode'])) {
    $id_data = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_arsipan WHERE id_data='$id_data'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if ($query_cek) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
        if ($data_cek) {
            $file = $data_cek['upload_file'];
            if (file_exists("file/$file")) {
                unlink("file/$file");
            }


            $sql_hapus = "DELETE FROM tb_arsipan WHERE id_data='$id_data'";
            // $sql_hapus = "UPDATE  tb_arsipan SET file='deleted' WHERE id_data='$id_data'";
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
                        window.location = 'dashboard.php?page=data-arsipan';
                    }
                });
                </script>";
            } else {
                $error_msg = mysqli_error($koneksi);
                echo "<script>
                Swal.fire({
                    title: 'Hapus Data Gagal',
                    text: '$error_msg',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=data-arsipan';
                    }
                });
                </script>";
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
                    window.location = 'dashboard.php?page=data-arsipan';
                }
            });
            </script>";
        }
    } else {
        $error_msg = mysqli_error($koneksi);
        echo "<script>
        Swal.fire({
            title: 'Query Gagal',
            text: '$error_msg',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-arsipan';
            }
        });
        </script>";
    }
}
?>
