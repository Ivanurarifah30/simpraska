<?php
include 'koneksi.php';

// Generate ID KDR baru
$query = $koneksi->query("SELECT max(id_kdr) as kodeTerbesar FROM tb_kdr");
$data = $query->fetch_array();
$id_kdr = (int) substr($data['kodeTerbesar'], 3) + 1;
$id_kdr = "KDR" . sprintf("%03s", $id_kdr);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data KDR</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-plus"></i> Tambah Data
            </h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID KDR</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="id_kdr" name="id_kdr" placeholder="ID KDR" required value="<?php echo htmlspecialchars($id_kdr); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID Anggota</label>
                    <div class="col-sm-5">
                        <select name="id_anggota" id="id_anggota" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $stmt_anggota = $koneksi->prepare("SELECT id_anggota, nama FROM tb_anggota ORDER BY nama ASC");
                            if (!$stmt_anggota) {
                                die("Prepare statement failed: " . $koneksi->error);
                            }
                            $stmt_anggota->execute();
                            $result_anggota = $stmt_anggota->get_result();

                            if ($result_anggota->num_rows > 0) {
                                while ($data_anggota = $result_anggota->fetch_assoc()) {
                                    echo '<option value="' . $data_anggota['id_anggota'] . '">' . $data_anggota['nama'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Tidak ada data anggota</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-5">
                        <select name="jabatan" id="jabatan" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="KDR Putra">KDR Putra</option>
                            <option value="KDR Putri">KDR Putri</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Periode</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="periode" name="periode" placeholder="Periode" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto KDR</label>
                    <div class="col-sm-6">
                        <input type="file" id="foto" name="foto" accept="image/jpeg, image/png">
                        <p class="help-block text-danger">Format file: JPG/PNG. Max size: 2MB</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="Submit" value="Tambah" class="btn btn-info">
                <a href="?page=data-kdr" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['Submit'])) {
        $id_kdr = $_POST['id_kdr'];
        $id_anggota = $_POST['id_anggota'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $periode = $_POST['periode'];
        $foto = '';

        // Proses upload foto
        if (!empty($_FILES['foto']['tmp_name'])) {
            $sumber = $_FILES['foto']['tmp_name'];
            $target = 'foto/';
            $nama_file = basename($_FILES['foto']['name']);
            $ukuran_file = $_FILES['foto']['size'];
            $tipe_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
            $upload_ok = 1;

            // Validasi file
            if ($ukuran_file > 2000000) {
                echo "<script>alert('Ukuran file terlalu besar. Maksimal 2MB.');</script>";
                $upload_ok = 0;
            }

            if ($tipe_file != "jpg" && $tipe_file != "png") {
                echo "<script>alert('Format file tidak didukung. Hanya JPG/PNG.');</script>";
                $upload_ok = 0;
            }

            if ($upload_ok == 1 && move_uploaded_file($sumber, $target . $nama_file)) {
                $foto = $nama_file;
            }
        }

        // Insert data ke database
        $stmt_insert = $koneksi->prepare("INSERT INTO tb_kdr (id_kdr, id_anggota, nama, jabatan, periode, foto) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt_insert) {
            die("Prepare statement failed: " . $koneksi->error);
        }
        $stmt_insert->bind_param("ssssss", $id_kdr, $id_anggota, $nama, $jabatan, $periode, $foto);

        if ($stmt_insert->execute()) {
            echo "<script>
                Swal.fire({
                    title: 'Data Berhasil Ditambahkan',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=data-kdr';
                    }
                });
            </script>";
        } else {
            error_log("Error: " . $stmt_insert->error); // Log error untuk debugging
            echo "<script>
                Swal.fire({
                    title: 'Data Gagal Ditambahkan',
                    text: 'Kesalahan pada query: " . $stmt_insert->error . "',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }

        $stmt_insert->close();
        $koneksi->close();
    }
    ?>
</body>
</html>
