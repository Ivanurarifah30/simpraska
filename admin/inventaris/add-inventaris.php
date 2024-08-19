<?php ob_start(); ?>

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

        $query = mysqli_query($koneksi, "SELECT max(id_barang) as kodeTerbesar FROM tb_inventaris");
        $data = mysqli_fetch_array($query);
        $id_barang = $data['kodeTerbesar'];

        $urutan = (int) substr($id_barang, 3, 3);
        $urutan++;

        $huruf = "BRG";
        $id_barang = $huruf . sprintf("%03s", $urutan);
        ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="ID Barang" required="required" value="<?php echo $id_barang ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kondisi</label>
                <div class="col-sm-5">
                    <select name="kondisi" id="kondisi" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <option value="Baik">Baik</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tgl Pengecekan</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="tgl_pengecekan" name="tgl_pengecekan" placeholder="Tgl Pengecekan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Barang</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" accept="image/jpeg, image/png" required>
                    <p class="help-block text-danger">Format file: JPG/PNG, ukuran maksimal 500KB</p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=inventaris" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    // Handle file upload
    $foto = $_FILES['foto']['name'];
    $sumber = $_FILES['foto']['tmp_name'];
    $target_dir = 'foto/';
    $target_file = $target_dir . basename($foto);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an image
    $check = getimagesize($sumber);
    if ($check !== false) {
        // File is an image
    } else {
        echo "<script>
        Swal.fire({
            title: 'File bukan gambar',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=add-inventaris';
            }
        })
        </script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['foto']['size'] > 500000) {
        echo "<script>
        Swal.fire({
            title: 'File terlalu besar',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=add-inventaris';
            }
        })
        </script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "jpg" && $fileType != "png") {
        echo "<script>
        Swal.fire({
            title: 'Format file tidak diizinkan',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=add-inventaris';
            }
        })
        </script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>
        Swal.fire({
            title: 'Gagal mengupload file',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=add-inventaris';
            }
        })
        </script>";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($sumber, $target_file)) {
            // Insert into database
            $sql_simpan = "INSERT INTO tb_inventaris (id_barang, nama_barang, jumlah, kondisi, keterangan, tgl_pengecekan, foto) VALUES (
                '" . htmlspecialchars($_POST['id_barang']) . "',
                '" . htmlspecialchars($_POST['nama_barang']) . "',
                '" . htmlspecialchars($_POST['jumlah']) . "',
                '" . htmlspecialchars($_POST['kondisi']) . "',
                '" . htmlspecialchars($_POST['keterangan']) . "',
                '" . htmlspecialchars($_POST['tgl_pengecekan']) . "',
                '" . $foto . "')";
            $query_simpan = mysqli_query($koneksi, $sql_simpan);
            mysqli_close($koneksi);

            if ($query_simpan) {
                echo "<script>
                Swal.fire({
                    title: 'Tambah Data Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=inventaris';
                    }
                })
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Tambah Data Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=add-inventaris';
                    }
                })
                </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                title: 'Gagal mengupload file',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=add-inventaris';
                }
            })
            </script>";
        }
    }
}
?>

<?php ob_end_flush(); ?>
