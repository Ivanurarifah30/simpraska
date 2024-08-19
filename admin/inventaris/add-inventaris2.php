<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
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
 
	$huruf = "AJR";
	$id_barang = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Barang</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="id_barang" required="required" value="<?php echo $id_barang ?>" readonly>
				
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama_barang" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kondisi</label>
				<div class="col-sm-5">
					<select name="kondisi" id="kondisi" class="form-control">
						<option>- Pilih -</option>
						<option>Baik</option>
						<option>Sedang</option>
						<option>Rusak</option>
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
				<label class="col-sm-2 col-form-label">Tgl Pengecekan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tgl_pengecekan" name="tgl_pengecekan" placeholder="tgl_pengecekan" required>
				</div>
			</div>

			<div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Barang</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" accept="image/jpeg, image/png">
                    <p class="help-block text-danger">Format file: JPG/PNG</p>
                </div>
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

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_inventaris (id_barang, nama_barang, jumlah, kondisi, keterangan, tgl_pengecekan,  foto) VALUES (
           '".$_POST['id_barang']."',
			'".$_POST['nama_barang']."',
			 '".$_POST['jumlah']."',
			'".$_POST['kondisi']."',
			'".$_POST['keterangan']."',
			'".$_POST['tgl_pengecekan']."',
			
            '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'dashboard.php?page=inventaris';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'dashboard.php?page=add-inventaris';
				}
			})</script>";
		  }
		  }
		}
     //selesai proses simpan data
