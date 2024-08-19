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
 
	$query = mysqli_query($koneksi, "SELECT max(id_data) as kodeTerbesar FROM tb_arsipan");
	$data = mysqli_fetch_array($query);
	$id_data = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($id_data, 3, 3);
	$urutan++;
 
	$huruf = "DT";
	$id_data = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID DATA</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="id_data" name="id_data" placeholder="id_data" required="required" value="<?php echo $id_data ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama File</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_file" name="nama_file" placeholder="nama_file" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-5">
					<select name="kategori" id="kategori" class="form-control">
						<option>- Pilih -</option>
						<option>Surat surat</option>
						<option>Arsipan Lainnya</option>
					</select>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required>
				</div>
			</div>

		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload FILE</label>
				<div class="col-sm-6">
					<input type="file" id="upload_file" name="upload_file" required>
					<p class="help-block">
						<font color="red">"Format file PDF"</font>
					</p>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-lpj" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<<?php
if (isset($_POST['Simpan'])) {
	session_start();
	$sumber = @$_FILES['upload_file']['tmp_name'];
	$target = 'file/';
	$nama_file = @$_FILES['upload_file']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['Simpan'])) {

	if (!empty($sumber)) {
		$sql_simpan = "INSERT INTO tb_arsipan (id_data,nama_file, tahun,kategori,keterangan, upload_file) VALUES (
           '" . $_POST['id_data'] . "',
		    '" . $_POST['nama_file'] . "',
			'" . $_POST['tahun'] . "',
			'" . $_POST['kategori'] . "',
			'" . $_POST['keterangan'] . "',
            '" . $nama_file . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		
	 if ($query_simpan && $_SESSION['ses_status'] == 'anggota') {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'dashboard.php?page=data-arsipan2';
			}
		})</script>";
	} elseif ($query_simpan && $_SESSION['ses_status'] == 'Admin') {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'dashboard.php?page=data-arsipan';
			}
		})</script>";
	}
	else {
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'dashboard.php?page=add-arsipan2';
			}
		})</script>";
	}
} elseif (empty($sumber)) {
	echo "<script>
		  Swal.fire({title: 'Gagal, File Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		  }).then((result) => {
			  if (result.value) {
				  window.location = 'dashboard.php?page=add-arsipan2';
			  }
		  })</script>";
}
}
}