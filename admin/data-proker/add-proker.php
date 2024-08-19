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
                $query = mysqli_query($koneksi, "SELECT max(id_proker) as kodeTerbesar FROM tb_proker");
                $data = mysqli_fetch_array($query);
                $id_proker = $data['kodeTerbesar'];
                $urutan = (int) substr($id_proker, 3, 3);
                $urutan++;
                $huruf = "PK";
                $id_proker = $huruf . sprintf("%03s", $urutan);
            ?>

            <!-- Form Input ID Proker -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Proker</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_proker" name="id_proker" placeholder="id_proker" required="required" value="<?php echo $id_proker ?>" readonly>
                </div>
            </div>

            <!-- Form Input Nama Proker -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Proker</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_proker" name="nama_proker" placeholder="nama_proker" required>
                </div>
            </div>

            <!-- Form Input Tanggal Pelaksana -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tgl Ditetapkan</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="tgl_ditetapkan" name="tgl_ditetapkan" placeholder="tgl_ditetapkan" required>
                </div>
            </div>

            <!-- Form Input Status -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="status" id="status" class="form-control">
                        <option value="">- Pilih -</option>
                        <option value="Direncanakan">Direncanakan</option>
                        <option value="Berlangsung">Berlangsung</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </div>

            <!-- Form Input ID PJ -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID PJ</label>
                <div class="col-sm-5">
                    <select name="id_pj" id="id_pj" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <?php
                        $stmt_penanggungjawab = $koneksi->prepare("SELECT id_pj, nama FROM tb_penanggungjawab ORDER BY nama ASC");
                        if (!$stmt_penanggungjawab) {
                            die("Prepare statement failed: " . $koneksi->error);
                        }
                        $stmt_penanggungjawab->execute();
                        $result_penanggungjawab = $stmt_penanggungjawab->get_result();

                        if ($result_penanggungjawab->num_rows > 0) {
                            while ($data_penanggungjawab = $result_penanggungjawab->fetch_assoc()) {
                                echo '<option value="' . $data_penanggungjawab['id_pj'] . '">' . $data_penanggungjawab['nama'] . '</option>';
                            }
                        } else {
                            echo '<option value="">Tidak ada data penangungjawab</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Form Input Keterangan -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required>
                </div>
            </div>

            <!-- Form Upload RAB -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload RAB</label>
                <div class="col-sm-6">
                    <input type="file" id="upload_rab" name="upload_rab" required>
                    <p class="help-block">
                        <font color="red">"Format file PDF"</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-proker" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    $sumber = $_FILES['upload_rab']['tmp_name'];
    $target = 'file/';
    $nama_file = $_FILES['upload_rab']['name'];
    $pindah = move_uploaded_file($sumber, $target . $nama_file);

    if ($pindah) {
        $sql_simpan = "INSERT INTO tb_proker (id_proker, nama_proker, tgl_ditetapkan, status, id_pj, keterangan, upload_rab) VALUES (
            '" . mysqli_real_escape_string($koneksi, $_POST['id_proker']) . "',
            '" . mysqli_real_escape_string($koneksi, $_POST['nama_proker']) . "',
            '" . mysqli_real_escape_string($koneksi, $_POST['tgl_ditetapkan']) . "',
            '" . mysqli_real_escape_string($koneksi, $_POST['status']) . "',
            '" . mysqli_real_escape_string($koneksi, $_POST['id_pj']) . "',
            '" . mysqli_real_escape_string($koneksi, $_POST['keterangan']) . "',
            '" . mysqli_real_escape_string($koneksi, $nama_file) . "')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            mysqli_close($koneksi);
            $redirect_page = $_SESSION['ses_status'] == 'anggota' ? 'dashboard.php?page=data-proker2' : 'dashboard.php?page=data-proker';
            echo "<script>
                Swal.fire({
                    title: 'Tambah Data Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = '$redirect_page';
                    }
                })
            </script>";
        } else {
            $error_message = mysqli_error($koneksi);
            mysqli_close($koneksi);
            echo "<script>
                Swal.fire({
                    title: 'Tambah Data Gagal',
                    text: 'Error: $error_message',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=add-proker';
                    }
                })
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Gagal, File Wajib Diisi',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=add-proker';
                }
            })
        </script>";
    }
}
?>
