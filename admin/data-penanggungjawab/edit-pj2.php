<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_penanggungjawab WHERE id_pj='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
<?php
	
	include 'koneksi.php';
 
	$query = mysqli_query($koneksi, "SELECT max(id_pj) as kodeTerbesar FROM tb_penanggungjawab");
	$data = mysqli_fetch_array($query);
	$id_pj = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($id_pj, 3, 3);
	$urutan++;
 
	$huruf = "P";
	$id_pj = $huruf . sprintf("%03s", $urutan);
	?>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID PJ</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_pj" name="id_pj" value="<?php echo $data_cek['id_pj']; ?>"
					 readonly/>
					 
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAR/NIP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nar/nip" name="nar/nip" value="<?php echo $data_cek['nar/nip']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto PJ</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pj" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
     $foto= $data_cek['foto'];
     if (file_exists("foto/$foto")){
          unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_penanggungjawab SET
			nar/nip='".$_POST['nar/nip']."',
			nama='".$_POST['nama']."',
			jabatan='".$_POST['jabatan']."',
			foto='".$nama_file."'		
            WHERE id_pj='".$_POST['id_pj']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_penanggungjawab SET
		nar/nip='".$_POST['nar/nip']."',
		nama='".$_POST['nama']."',
		jabatan='".$_POST['jabatan']."',
		
		WHERE id_pj='".$_POST['id_pj']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
      }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pj2';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pj2';
            }
        })</script>";
    }
}

