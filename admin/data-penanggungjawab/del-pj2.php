<?php
include 'koneksi.php'; // Pastikan path ini benar dan file koneksi.php sudah di-include

if (isset($_GET['kode'])) {
    $id_pj = mysqli_real_escape_string($koneksi, $_GET['kode']);
    
    // Hapus data terkait di tb_proker
    $sql_hapus_proker = "DELETE FROM tb_proker WHERE id_pj='$id_pj'";
    $query_hapus_proker = mysqli_query($koneksi, $sql_hapus_proker);
    
    if ($query_hapus_proker) {
        $sql_cek = "SELECT * FROM tb_penanggungjawab WHERE id_pj='$id_pj'";
        $query_cek = mysqli_query($koneksi, $sql_cek);

        if ($query_cek) {
            $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
            if ($data_cek) {
                $foto = $data_cek['foto'];
                if (file_exists("foto/$foto")) {
                    unlink("foto/$foto");
                }

                $sql_hapus = "DELETE FROM tb_penanggungjawab WHERE id_pj='$id_pj'";
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
                            window.location = 'dashboard.php?page=data-pj2';
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
                            window.location = 'dashboard.php?page=data-pj2';
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
                        window.location = 'dashboard.php?page=data-pj2';
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
                    window.location = 'dashboard.php?page=data-pj2';
                }
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Gagal Menghapus Data Tergantung',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-pj2';
            }
        });
        </script>";
    }
}
?>
