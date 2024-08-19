<?php
include 'koneksi.php';

if(isset($_GET['kode'])){
    $id_anggota = mysqli_real_escape_string($koneksi, $_GET['kode']);

    // Hapus data terkait di tb_kdr terlebih dahulu
    $sql_hapus_kdr = "DELETE FROM tb_kdr WHERE id_anggota='$id_anggota'";
    $query_hapus_kdr = mysqli_query($koneksi, $sql_hapus_kdr);

    if ($query_hapus_kdr) {
        $sql_cek = "SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'";
        $query_cek = mysqli_query($koneksi, $sql_cek);

        if ($query_cek) {
            $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
            if ($data_cek) {
                $foto = $data_cek['foto'];
                if (file_exists("foto/$foto")) {
                    unlink("foto/$foto");
                }

                $sql_hapus = "DELETE FROM tb_anggota WHERE id_anggota='$id_anggota'";
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
                            window.location = 'dashboard.php?page=data-anggota';
                        }
                    })
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
                            window.location = 'dashboard.php?page=data-anggota';
                        }
                    })
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
                        window.location = 'dashboard.php?page=data-anggota';
                    }
                })
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
                    window.location = 'dashboard.php?page=data-anggota';
                }
            })
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Hapus Data di tb_kdr Gagal',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-anggota';
            }
        })
        </script>";
    }
}
?>
