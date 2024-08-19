<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <?php
            include 'koneksi.php';

            if (!$koneksi) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = mysqli_query($koneksi, "SELECT max(id_anggota) as kodeTerbesar FROM tb_anggota");
            $data = mysqli_fetch_array($query);
            $id_anggota = $data['kodeTerbesar'];
            $urutan = (int) substr($id_anggota, 1, 3) + 1;
            $huruf = "P";
            $id_anggota = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Anggota</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_anggota" name="id_anggota" required value="<?php echo $id_anggota ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAR</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nar" name="nar" placeholder="NAR" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">TTL</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat, Tanggal Lahir"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NPM</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fakultas</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="status" id="status" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"
                        required>
                </div>
            </div>

           

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Anggota</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" accept="image/jpeg, image/png">
                    <p class="help-block text-danger">Format file: JPG/PNG</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-anggota" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $sumber = $_FILES['foto']['tmp_name'];
    $target = 'foto/';
    $nama_file = $_FILES['foto']['name'];

    // Validasi file
    if ($_FILES['foto']['size'] > 2000000 || !in_array(strtolower(pathinfo($nama_file, PATHINFO_EXTENSION)), ['jpg', 'png'])) {
        echo "<script>alert('Ukuran file terlalu besar atau format file tidak didukung.');</script>";
    } else {
        if (move_uploaded_file($sumber, $target . $nama_file)) {
            $sql_simpan = "INSERT INTO tb_anggota (id_anggota, nar, nama, ttl, alamat, npm, fakultas, jurusan, no_telp, status, keterangan, foto) VALUES (
                '" . $_POST['id_anggota'] . "',
                '" . $_POST['nar'] . "',
                '" . $_POST['nama'] . "',
                '" . $_POST['ttl'] . "',
                '" . $_POST['alamat'] . "',
                '" . $_POST['npm'] . "',
                '" . $_POST['fakultas'] . "',
                '" . $_POST['jurusan'] . "',
                '" . $_POST['no_telp'] . "',
                '" . $_POST['status'] . "',
                '" . $_POST['keterangan'] . "',
                '" . $nama_file . "')";

            echo $sql_simpan; // Debugging query

            $query_simpan = mysqli_query($koneksi, $sql_simpan);

            if ($query_simpan) {
                echo "<script>
                    Swal.fire({
                        title: 'Tambah Data Berhasil',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=data-anggota';
                        }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        title: 'Tambah Data Gagal',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'dashboard.php?page=add-anggota';
                        }
                    });
                </script>";
            }
        } else {
            echo "<script>alert('File gagal diunggah.');</script>";
        }
    }
}
?>
