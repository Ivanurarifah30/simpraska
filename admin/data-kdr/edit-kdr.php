<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_kdr' => '',
    'id_anggota' => '',
    'nama' => '',
    'jabatan' => '',
    'periode' => '',
    'foto' => ''
];

if (isset($_GET['kode'])) {
    $kode_kdr = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql_cek = "SELECT * FROM tb_kdr WHERE id_kdr='$kode_kdr'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if ($query_cek && mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    }
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID KDR</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_kdr" name="id_kdr" value="<?php echo htmlspecialchars($data_cek['id_kdr']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Anggota</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo htmlspecialchars($data_cek['id_anggota']); ?>" required />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data_cek['nama']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <select name="jabatan" id="jabatan" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <option value="KDR Putra" <?php echo ($data_cek['jabatan'] == 'KDR Putra') ? 'selected' : ''; ?>>KDR Putra</option>
                        <option value="KDR Putri" <?php echo ($data_cek['jabatan'] == 'KDR Putri') ? 'selected' : ''; ?>>KDR Putri</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="periode" name="periode" value="<?php echo htmlspecialchars($data_cek['periode']); ?>" required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto KDR</label>
                <div class="col-sm-6">
                    <?php if (!empty($data_cek['foto'])): ?>
                        <a href="foto/<?php echo htmlspecialchars($data_cek['foto']); ?>" target="_blank">Lihat foto</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah Foto</label>
                <div class="col-sm-5">
                    <input type="file" id="foto" name="foto" accept=".pdf">
                    <p class="help-block">
                        <font color="red">"Format file PDF"</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-kdr" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $id_kdr = mysqli_real_escape_string($koneksi, $_POST['id_kdr']);
    $id_anggota = mysqli_real_escape_string($koneksi, $_POST['id_anggota']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $periode = mysqli_real_escape_string($koneksi, $_POST['periode']);
    
    // Handle file upload
    $sumber = @$_FILES['foto']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto']['name'];
    $foto = $data_cek['foto'];

    if (!empty($sumber)) {
        // Remove old file if exists
        if (!empty($foto) && file_exists($target . $foto)) {
            unlink($target . $foto);
        }

        // Move new file
        if (move_uploaded_file($sumber, $target . $nama_file)) {
            $foto = $nama_file;
        } else {
            echo "<script>
            Swal.fire({title: 'Upload Foto Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
            .then((result) => {
                if (result.value) {
                    window.location = '?page=data-kdr';
                }
            });
            </script>";
            exit();
        }
    }

    // Update data
    $sql_ubah = "UPDATE tb_kdr SET
        id_anggota='$id_anggota',
        nama='$nama',
        jabatan='$jabatan',
        periode='$periode',
        foto='$foto'
        WHERE id_kdr='$id_kdr'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = '?page=data-kdr';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = '?page=data-kdr';
            }
        });
        </script>";
    }
}
?>
