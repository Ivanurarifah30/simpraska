<?php
include 'koneksi.php'; // Pastikan path sesuai

$data_cek = [
    'id_pembina' => '',
    'nip' => '',
    'nama' => '',
    'status' => '',
    'jabatan' => '',
	'no_telp' => '',
    'foto' => ''
];

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pembina WHERE id_pembina='" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if ($query_cek) {
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
            <?php
            $query = mysqli_query($koneksi, "SELECT max(id_pembina) as kodeTerbesar FROM tb_pembina");
            $data = mysqli_fetch_array($query);
            $id_pembina = $data['kodeTerbesar'];

            $urutan = (int) substr($id_pembina, 3, 3);
            $urutan++;

            $huruf = "P";
            $id_pembina = $huruf . sprintf("%03s", $urutan);
            ?>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID pembina</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="id_pembina" name="id_pembina" value="<?php echo htmlspecialchars($data_cek['id_pembina']); ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo htmlspecialchars($data_cek['nip']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data_cek['nama']); ?>" />
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Majelis Pembimbing Gugusdepan" <?php if ($data_cek['status'] == "Majelis Pembimbing Gugusdepan") echo "selected"; ?>>Majelis Pembimbing Gugusdepan</option>
                        <option value="Pembina Gugusdepan Putera" <?php if ($data_cek['status'] == "Pembina Gugusdepan Putera") echo "selected"; ?>>Pembina Gugusdepan Putera</option>
						<option value="Pembina Gugusdepan Puteri" <?php if ($data_cek['status'] == "Pembina Gugusdepan Puteri") echo "selected"; ?>>Pembina Gugusdepan Puteri</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($data_cek['jabatan']); ?>" />
                </div>
            </div>

			<div class="form-group row">
                <label class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($data_cek['no_telp']); ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto pembina</label>
                <div class="col-sm-6">
                    <img src="foto/<?php echo htmlspecialchars($data_cek['foto']); ?>" width="160px" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah Foto</label>
                <div class="col-sm-5">
                    <input type="file" id="foto" name="foto">
                    <p class="help-block">
                        <font color="red">"Format file Jpg/Png"</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pembina" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
	$no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    
    $sumber = @$_FILES['foto']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto']['name'];
    $pindah = move_uploaded_file($sumber, $target . $nama_file);

    if (!empty($sumber)) {
        $foto = $data_cek['foto'];
        if (file_exists("foto/$foto")) {
            unlink("foto/$foto");
        }

        $sql_ubah = "UPDATE tb_pembina SET
            nip='$nip',
            nama='$nama',
            status='$status',
            jabatan='$jabatan',
			 no_telp='$no_telp',
            foto='$nama_file'
            WHERE id_pembina='" . mysqli_real_escape_string($koneksi, $_POST['id_pembina']) . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    } elseif (empty($sumber)) {
        $sql_ubah = "UPDATE tb_pembina SET
             nip='$nip',
            nama='$nama',
            status='$status',
            jabatan='$jabatan',
			 no_telp='$no_telp',
            foto='$nama_file'
            WHERE id_pembina='" . mysqli_real_escape_string($koneksi, $_POST['id_pembina']) . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-pembina';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {
            if (result.value) {
                window.location = 'dashboard.php?page=data-pembina';
            }
        });
        </script>";
    }
}
?>
