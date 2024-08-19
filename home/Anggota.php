<?php

        $sql_cek = "SELECT * FROM tb_profil";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{

		
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil </h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Kegiatan Mahasiswa</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ukm" name="ukm" value="<?php echo $data_cek['ukm']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Racana</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="racana" name="racana" value="<?php echo $data_cek['racana']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Instansi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?php echo $data_cek['nama_instansi']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>

<?php
		}
		$sql = $koneksi->query("SELECT count(nar) as lokal1 from tb_anggota");
		while ($data= $sql->fetch_assoc()) {
		
			$lokal1=$data['lokal1'];
		}
	?>
	
	<?php
			
		$sql = $koneksi->query("SELECT count(nip) as lokal2 from tb_pembina");
		while ($data= $sql->fetch_assoc()) {
		
			$lokal2=$data['lokal2'];
		}
	?>
	
	<?php
			
		$sql = $koneksi->query("SELECT count(id_lpj) as lokal3 from tb_lpj");
		while ($data= $sql->fetch_assoc()) {
		
			$lokal3=$data['lokal3'];
		}
	?>
	
	<?php
		$sql = $koneksi->query("SELECT count(id_proker) as iva from tb_proker");
		while ($data= $sql->fetch_assoc()) {
		
			$iva=$data['iva'];
		}
	?>
	
	
	
	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3>
						<?php echo $lokal1;  ?>
					</h3>
	
					<p>Jumlah Anggota</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="dashboard.php?page=data-anggota" class="small-box-footer">Selengkapnya
					
				</a>
			</div>
		</div>
	
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3>
						<?php echo $lokal2;  ?>
					</h3>
	
					<p>Jumlah Pembina</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="dashboard.php?page=data-pembina" class="small-box-footer">Selengkapnya
					
				</a>
			</div>
		</div>
	
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h3>
						<?php echo $lokal3;  ?>
					</h3>
	
					<p>LPJ</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="dashboard.php?page=pdata-lpj" class="small-box-footer">Selengkapnya
					
				</a>
			</div>
		</div>
		<!-- ./col -->
		
		<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $iva;  ?>
				</h3>

				<p>Program Kerja</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="dashboard.php?page=data-proker" class="small-box-footer">Informasi
			</a>
		</div>
	</div>