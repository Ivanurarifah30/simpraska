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
                    <input type="text" class="form-control" id="id_pj" name="id_pj" placeholder="id_pj" required="required" value="<?php echo $id_pj ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAR/NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nar_nip" name="nar_nip" placeholder="NAR/NIP" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto PJ</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto">
                    <p class="help-block">
                        <font color="red">"Format file JPG/PNG"</font>
                    </p>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-pj" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    // Validasi foto
    $sumber = $_FILES['foto']['tmp_name'];
    $target = 'foto/';
    $nama_file = $_FILES['foto']['name'];

    if (!empty($sumber)) {
        $pindah = move_uploaded_file($sumber, $target.$nama_file);
        
        if ($pindah) {
            // Simpan data ke database
            $sql_simpan = "INSERT INTO tb_penanggungjawab (id_pj, nar_nip, nama, jabatan, foto) VALUES (
                '".$_POST['id_pj']."',
                '".$_POST['nar_nip']."',
                '".$_POST['nama']."',
                '".$_POST['jabatan']."',
                '".$nama_file."')";
            
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
                        window.location = 'dashboard.php?page=data-pj2';
                    }
                })</script>";
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Tambah Data Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'dashboard.php?page=add-pj2';
                    }
                })</script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                title: 'Gagal, Foto Tidak Dapat Diunggah',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'dashboard.php?page=add-pj2';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Gagal, Foto Wajib Diisi',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=add-pj2';
            }
        })</script>";
    }
}
?>
