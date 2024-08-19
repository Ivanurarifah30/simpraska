<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <!-- Include your CSS and JS libraries here -->
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
    <script src="path/to/your/js/sweetalert2.all.min.js"></script>
</head>
<body>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="card-body">

            <?php
            include 'koneksi.php';
            
            // Generate ID PJ secara otomatis
            $query = mysqli_query($koneksi, "SELECT max(id_pj) as kodeTerbesar FROM tb_penanggungjawab");
            $data = mysqli_fetch_array($query);
            $id_pj = $data['kodeTerbesar'];

            $urutan = (int) substr($id_pj, 1, 3); // Mengubah substring dari indeks 1
            $urutan++;

            $huruf = "P";
            $id_pj = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID PJ</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_pj" name="id_pj" placeholder="ID PJ" required="required" value="<?php echo $id_pj ?>" readonly>
                </div>
            </div>

            <!-- Dropdown untuk ID Anggota -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Anggota</label>
                <div class="col-sm-5">
                    <select class="form-control" id="id_anggota" name="id_anggota">
                        <option value="">-- Pilih Anggota --</option>
                        <?php
                        $query_anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                        while ($data_anggota = mysqli_fetch_array($query_anggota)) {
                            echo "<option value='".$data_anggota['id_anggota']."'>".$data_anggota['id_anggota']." - ".$data_anggota['nama']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Dropdown untuk ID Pembina -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Pembina</label>
                <div class="col-sm-5">
                    <select class="form-control" id="id_pembina" name="id_pembina">
                        <option value="">-- Pilih Pembina --</option>
                        <?php
                        $query_pembina = mysqli_query($koneksi, "SELECT * FROM tb_pembina");
                        while ($data_pembina = mysqli_fetch_array($query_pembina)) {
                            echo "<option value='".$data_pembina['id_pembina']."'>".$data_pembina['id_pembina']." - ".$data_pembina['nama']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Input Nama -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
            </div>

            <!-- Input Jabatan -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Submit" value="Simpan" class="btn btn-info">
            <a href="?page=data-pj" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
    if (isset($_POST['Submit'])) {
        $id_pj = $_POST['id_pj'];
        $id_anggota = $_POST['id_anggota'];
        $id_pembina = $_POST['id_pembina'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        

        // Insert data ke database
        $stmt_insert = $koneksi->prepare("INSERT INTO tb_penanggungjawab (id_pj, id_anggota, id_pembina, nama, jabatan ) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt_insert) {
            die("Prepare statement failed: " . $koneksi->error);
        }
        $stmt_insert->bind_param("sssss", $id_pj, $id_anggota, $id_pembina, $nama, $jabatan);

        if ($stmt_insert->execute()) {
            echo "<script>
                Swal.fire({
                    title: 'Data Berhasil Ditambahkan',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=data-pj';
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
