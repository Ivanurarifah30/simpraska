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
				<input type="text" class="form-control" id="id_pembina" name="id_pembina" placeholder="id_pembina" required="required" value="<?php echo $id_pembina ?>" readonly>
				
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nip" name="nip" placeholder="nip" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-5">
					<select name="status" id="status" class="form-control">
						<option>- Pilih -</option>
						<option>Majelis Pembimbing Gugusdepan</option>
						<option>Pembina Gugusdepan Putera</option>
						<option>Pembina Gugusdepan Puteri</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" required>
				</div>
			</div>

			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telp</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp" required>
				</div>
			</div>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto pembina</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pembina" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$sumber = @$_FILES['foto']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['Simpan'])) {

	if (!empty($sumber)) {
		$sql_simpan = "INSERT INTO tb_pembina (id_pembina, nip, nama, status, jabatan, no_telp, foto) VALUES (
             '" . $_POST['id_pembina'] . "',
		    '" . $_POST['nip'] . "',
			'" . $_POST['nama'] . "',
			'" . $_POST['status'] . "',
			'" . $_POST['jabatan'] . "',
			'" . $_POST['no_telp'] . "',
	
			
            '" . $nama_file . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		if ($query_simpan && $_SESSION['ses_status'] == 'anggota') {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'dashboard.php?page=data-pembina2';
				}
			})</script>";
		} elseif ($query_simpan && $_SESSION['ses_status'] == 'Admin') {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'dashboard.php?page=data-pembina';
				}
			})</script>";
		}
		else {
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'dashboard.php?page=add-pembina';
				}
			})</script>";
		}
	} elseif (empty($sumber)) {
		echo "<script>
			  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
			  }).then((result) => {
				  if (result.value) {
					  window.location = 'dashboard.php?page=add-pembina';
				  }
			  })</script>";
	}
}
     //selesai proses simpan data
