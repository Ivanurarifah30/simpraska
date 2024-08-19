<?php
include 'koneksi.php'; // Pastikan koneksi database sudah didefinisikan

if (isset($_GET['kode'])) {
    $kode = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_penanggungjawab WHERE id_pj='$kode'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
} else {
    echo "<script>alert('Kode tidak ada');window.location.href='?page=data-pj';</script>";
    exit;
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID PJ</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_pj" name="id_pj" value="<?php echo htmlspecialchars($data_cek['id_pj']); ?>" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Anggota</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo htmlspecialchars($data_cek['id_anggota']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Pembina</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_pembina" name="id_pembina" value="<?php echo htmlspecialchars($data_cek['id_pembina']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data_cek['nama']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($data_cek['jabatan']); ?>" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pj" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $id_pj = mysqli_real_escape_string($koneksi, $_POST['id_pj']);
    $id_anggota = mysqli_real_escape_string($koneksi, $_POST['id_anggota']);
    $id_pembina = mysqli_real_escape_string($koneksi, $_POST['id_pembina']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);

    $sql_ubah = "UPDATE tb_penanggungjawab SET
        id_anggota='$id_anggota',
        id_pembina='$id_pembina',
        nama='$nama',
        jabatan='$jabatan'
        WHERE id_pj='$id_pj'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Berhasil',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=data-pj';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Gagal',
                text: 'Kesalahan pada query: " . mysqli_error($koneksi) . "',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=data-pj';
                }
            });
        </script>";
    }
}
?>
