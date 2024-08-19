<?php
//Mulai Sesion
session_start();

if (isset($_SESSION["ses_username"]) == "") {
	//header("location: view/index.php");
	header("location: login.php");

} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_status = $_SESSION["ses_status"];
}

//KONEKSI DB
include "koneksi.php";


$sql = $koneksi->query("SELECT * from tb_profil");
while ($data = $sql->fetch_assoc()) {

	$nama = $data['ukm'];
	$nama = $data['nama_instansi'];
}
?>
<!-- <?php

setlocale(LC_TIME, 'id_ID.utf8');

$hariIni = new DateTime();

?> -->


<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIMPRASKA </title>
	<link rel="icon" href="img/logopramuka.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-blue"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link text-white font-weight-bold">
						<!-- <font color="white">
							<b>
								<?= var_dump($nama); ?>
							</b>
						</font> -->
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar background-color:#AEC6CF ">
			<!-- Brand Logo -->
			<a href="dashboard.php" class="brand-link">

				<span class="brand-text"> SIMPRASKA</span>
			</a>


			<!-- Sidebar -->
			<div class="sidebar" style="background-color: #00FF00;">
				<!-- Isi sidebar -->
			</div>


			<!-- Sidebar user (optional) -->
			<div class="user-panel mt-2 pb-2 mb-2 d-flex">
				<div class="image">
					<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
				</div>
				<div class="info">
					<a href="index.php" class="d-block">
						<?php echo $data_nama; ?>
					</a>
					<span class="badge badge-success">
						<?php echo $data_status; ?>
					</span>
				</div>
			</div>

			<!-- Sidebar Menu -->

			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">

					<!-- status  -->
					<?php
					if ($data_status == "Admin") {
						?>

						<li class="nav-item">
							<a href="dashboard.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="#" class="nav-link">
								<div data-toggle="collapse" href="#base">
									<i class="fas fa-layer-group"></i>
									<p>
										DATA
									</p>
									<i class="fas fa-angle-left right"></i>
							</a>
							<span class="caret"></span>
		               </div>
		              <div class="collapse" id="base">
			          <ul class="nav nav-collapse">

				<li class="nav-item">
					<a href="?page=data-anggota" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Anggota

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-pembina" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Pembina

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-kdr" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data KDR
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-proker" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Progam Kerja
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-lpj" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data LPJ
						</p>
					</a>
				</li>

			
				<li class="nav-item">
					<a href="?page=danakas" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Pengelolaan Keuangan
						</p>
					</a>
				</li>

				
				<li class="nav-item">
					<a href="?page=inventaris" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Inventaris Barang
						</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="?page=data-arsipan" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Arsipan 
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-pj" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Penanggungjawab
						</p>
					</a>
				</li>
			</ul>
		</div>
		</li>

		<li class="nav-item">
			<a href="#" class="nav-link">
				<div data-toggle="collapse" href="#laporan">
					<i class="nav-icon fas fa-clipboard-list"></i>
					<p>
						Laporan
					</p>
			</a>
			<span class="caret"></span>
			</div>
			<div class="collapse" id="laporan">
				<ul class="nav nav-collapse">
					<li class="nav-item">

						<a href="?page=laporan-data-anggota" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  Anggota</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data_pembina" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Pembina</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data_kdr" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  KDR</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data-proker" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  Proker</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data-lpj" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  LPJ</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-danakas" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Keuangan</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-inventaris" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Inventaris</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-arsipan" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Arsipan</p>
						</a>
					</li>	
		        </li>
		    </ul>
		  </div>
		</li>

		<li class="nav-header">Setting</li>
		<li class="nav-item">
			
		<li class="nav-item">
			<a href="?page=data-profil" class="nav-link">
				<i class="nav-icon far fa fa-flag"></i>
				<p>
					Profil
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="?page=data-pengguna" class="nav-link">
				<i class="nav-icon far fa-user"></i>
				<p>
					Pengguna Sistem
				</p>
			</a>
		</li>

		<?php
					} elseif ($data_status == "Anggota") {
						?>

		                <li class="nav-item">
		    	        <a href="dashboard.php" class="nav-link">
			 	          <i class="nav-icon fas fa-home"></i>
				          <p>
					       Dashboard
				          </p>
			            </a>
	                	</li>

		                    <li class="nav-item">
							<a href="#" class="nav-link">
								<div data-toggle="collapse" href="#base">
									<i class="fas fa-layer-group"></i>
									<p>
										DATA
									</p>
									<i class="fas fa-angle-left right"></i>
							</a>
							<span class="caret"></span>
		               </div>
		              <div class="collapse" id="base">
			          <ul class="nav nav-collapse">

				<li class="nav-item">
					<a href="?page=data-anggota2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Anggota

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-pembina2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Pembina

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-kdr2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data KDR
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-proker2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Progam Kerja
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-lpj2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data LPJ
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=danakas2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Pengelolaan Keuangan
						</p>
					</a>
				</li>

			
				<li class="nav-item">
					<a href="?page=inventaris2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Inventaris
						</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="?page=data-penanggungjawab2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Data Penanggungjawab
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="?page=data-arsipan2" class="nav-link">
						<i class="nav-icon far fa fa-users"></i>
						<p>
							Arsipan 
						</p>
					</a>
				</li>
			</ul>
		</div>
		</li>

		<li class="nav-item">
			<a href="#" class="nav-link">
				<div data-toggle="collapse" href="#laporan">
					<i class="nav-icon fas fa-clipboard-list"></i>
					<p>
						Laporan
					</p>
			</a>
			<span class="caret"></span>
			</div>
			<div class="collapse" id="laporan">
				<ul class="nav nav-collapse">
					<li class="nav-item">

						<a href="?page=laporan-data-anggota" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  Anggota</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data_pembina" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Pembina</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data_kdr" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  KDR</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data-proker" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  Proker</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-data-lpj" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan  LPJ</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-danakas" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Keuangan</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-inventaris" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Inventaris</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="?page=laporan-arsipan" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Laporan Arsipan</p>
						</a>
					</li>	
		        </li>
		    </ul>
		  </div>
		</li>


		<li class="nav-header">Setting</li>

		<?php
					}
					?>

	<li class="nav-item">
		<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
			<i class="nav-icon far fa-circle text-danger"></i>
			<p>
				Logout
			</p>
		</a>
	</li>


	</nav>
	<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- /. WEB DINAMIS DISINI ############################################################################### -->
			<div class="container-fluid">

				<?php
				if (isset($_GET['page'])) {
					$hal = $_GET['page'];

					switch ($hal) {
						//Klik Halaman Home Pengguna
						case 'Admin':
							include "home/Admin.php";
							break;
						case 'Anggota':
							include "home/Anggota.php";
							break;


						//Asrama
				
						case 'data-anggota':
							include "admin/data-anggota/data-anggota.php";
							break;
						case 'add-anggota':
							include "admin/data-anggota/add-anggota.php";
							break;
						case 'edit-anggota':
							include "admin/data-anggota/edit-anggota.php";
							break;
						case 'del-anggota':
							include "admin/data-anggota/del-anggota.php";
							break;
						case 'data-anggota-aktif':
							include "admin/data-anggota/anggota-aktif.php";
							break;
						case 'data-anggota-tidak-aktif':
							include "admin/data-anggota/anggota-tidak-aktif.php";
							break;
						case 'cetak':
							include "admin/data-anggota/cetak.php";
							break;
						case 'laporan-data-anggota':
							include "admin/data-anggota/laporan-anggota.php";
							break;
						case 'updateStatusAnggota':
							include "admin/data-anggota/updateStatusanggota.php";
							break;
						case 'view-anggota':
							include "admin/data-anggota/view-anggota.php";
							break;

						case 'data-anggota2':
							include "admin/data-anggota/data-anggota2.php";
							break;
						case 'add-anggota2':
							include "admin/data-anggota/add-anggota2.php";
							break;
						case 'edit-anggota2':
							include "admin/data-anggota/edit-anggota2.php";
							break;
						case 'del-anggota2':
							include "admin/data-anggota/del-anggota2.php";
							break;
						case 'data-anggota-aktif2':
							include "admin/data-anggota/anggota-aktif2.php";
							break;
						case 'data-anggota-tidak-aktif2':
							include "admin/data-anggota/anggota-tidak-aktif2.php";
							break;
						case 'updateStatusAnggota':
							include "admin/data-anggota/updateStatusanggota2.php";
							break;
						case 'view-anggota2':
							include "admin/data-anggota/view-anggota2.php";
							break;

						//pembina
						case 'data-pembina':
							include "admin/data-pembina/data-pembina.php";
							break;
						case 'add-pembina':
							include "admin/data-pembina/add-pembina.php";
							break;
						case 'edit-pembina':
							include "admin/data-pembina/edit-pembina.php";
							break;
						case 'del-pembina':
							include "admin/data-pembina/del-pembina.php";
							break;
						case 'laporan-data_pembina':
							include "admin/data-pembina/laporan-pembina.php";
							break;
						case 'update-status-pembina':
							include "admin/data-pembina/update-status-pembina.php";
							break;
						case 'view-pembina':
							include "admin/data-pembina/view-pembina.php";
							break;

						case 'data-pembina2':
							include "admin/data-pembina/data-pembina2.php";
							break;
						case 'update-jabatan-pembina':
							include "admin/data-pembina/update-jabatan-pembina2.php";
							break;
						case 'view-pembina2':
							include "admin/data-pembina/view-pembina2.php";
							break;

						//KDR
						case 'data-kdr':
							include "admin/data-kdr/data-kdr.php";
							break;
						case 'add-kdr':
							include "admin/data-kdr/add-kdr.php";
							break;
						case 'edit-kdr':
							include "admin/data-kdr/edit-kdr.php";
							break;
						case 'del-kdr':
							include "admin/data-kdr/del-kdr.php";
							break;
						case 'data-kdrputra':
							include "admin/data-kdr/kdr-putra.php";
							break;
						case 'data-kdrputri':
							include "admin/data-kdr/kdr-putri.php";
							break;
						case 'laporan-data_kdr':
							include "admin/data-kdr/laporan-kdr.php";
							break;
						case 'update-jabatan-kdr':
							include "admin/data-kdr/update-jabatan-kdr.php";
							break;
						case 'view-kdr':
							include "admin/data-kdr/view-kdr.php";
							break;

						case 'data-kdr2':
							include "admin/data-kdr/data-kdr2.php";
							break;
						case 'add-kdr2':
							include "admin/data-kdr/add-kdr2.php";
							break;
						case 'edit-kdr2':
							include "admin/data-kdr/edit-kdr2.php";
							break;
						case 'del-kdr2':
							include "admin/data-kdr/del-kdr2.php";
							break;
						case 'update-jabatan-kdr':
							include "admin/data-kdr/update-jabatan-kdr2.php";
							break;
						case 'view-kdr2':
							include "admin/data-kdr/view-kdr2.php";
							break;



						//proker
						case 'data-proker':
							include "admin/data-proker/data-proker.php";
							break;
						case 'add-proker':
							include "admin/data-proker/add-proker.php";
							break;
						case 'edit-proker':
							include "admin/data-proker/edit-proker.php";
							break;
						case 'del-proker':
							include "admin/data-proker/del-proker.php";
							break;
						case 'data-berlangsung':
							include "admin/data-proker/data-berlangsung.php";
							break;
						case 'data-direncanakan':
							include "admin/data-proker/data-direncanakan.php";
							break;
						case 'data-selesai':
							include "admin/data-proker/data-selesai.php";
							break;
						case 'laporan-data-proker':
							include "admin/data-proker/laporan-data-proker.php";
							break;
						case 'update-status-proker':
							include "admin/data-proker/update-status-proker.php";
							break;
						case 'view-proker':
							include "admin/data-proker/view-proker.php";
							break;

						case 'data-proker2':
							include "admin/data-proker/data-proker2.php";
							break;
						case 'add-proker2':
							include "admin/data-proker/add-proker2.php";
							break;
						case 'edit-proker2':
							include "admin/data-proker/edit-proker2.php";
							break;
						case 'del-proker2':
							include "admin/data-proker/del-proker2.php";
							break;
						case 'data-berlangsung2':
							include "admin/data-proker/data-berlangsung2.php";
							break;
						case 'data-direncanakan2':
							include "admin/data-proker/data-direncanakan2.php";
							break;
						case 'data-selesai2':
							include "admin/data-proker/data-selesai2.php";
							break;
						case 'laporan-proker':
							include "admin/data-proker/laporan-proker.php";
							break;
						case 'update-status-proker':
							include "admin/data-proker/update-status-proker2.php";
							break;
						case 'view-proker2':
							include "admin/data-proker/view-proker2.php";
							break;

						//lpj
						case 'data-lpj':
							include "admin/data-lpj/data-lpj.php";
							break;
						case 'add-lpj':
							include "admin/data-lpj/add-lpj.php";
							break;
						case 'edit-lpj':
							include "admin/data-lpj/edit-lpj.php";
							break;
						case 'del-lpj':
							include "admin/data-lpj/del-lpj.php";
							break;
						case 'lpj-kegiatan':
							include "admin/data-lpj/data-lpj-kegiatan.php";
							break;
						case 'data-lpj-pengurus':
							include "admin/data-lpj/data-lpj-pengurus.php";
							break;
						case 'laporan-data-lpj':
							include "admin/data-lpj/laporan-data-lpj.php";
							break;
						case 'update-kategori-lpj':
							include "admin/data-lpj/update-kategori-lpj2.php";
							break;
						case 'view-lpj':
							include "admin/data-lpj/view-lpj.php";
							break;

						case 'data-lpj2':
							include "admin/data-lpj/data-lpj2.php";
							break;
						case 'add-lpj2':
							include "admin/data-lpj/add-lpj2.php";
							break;
						case 'edit-lpj2':
							include "admin/data-lpj/edit-lpj2.php";
							break;
						case 'del-lpj2':
							include "admin/data-lpj/del-lpj2.php";
							break;
						case 'data-lpj-kegiatan':
							include "admin/data-lpj/data-lpj-kegiatan.php";
							break;
						case 'data-lpj-pengurus':
							include "admin/data-lpj/dara-lpj-pengurus.php";
							break;
						case 'laporan-data-lpj':
							include "admin/data-lpj/laporan-data-lpj.php";
							break;
						case 'update-kategori-lpj':
							include "admin/data-lpj/update-kategori-lpj2.php";
							break;
						case 'view-lpj2':
							include "admin/data-lpj/view-lpj2.php";
							break;


						//dabakaas
						case 'danakas':
							include "admin/pengelolaan-danakas/danakas.php";
							break;
						case 'add-danakas':
							include "admin/pengelolaan-danakas/add-danakas.php";
							break;
						case 'edit-danakas':
							include "admin/pengelolaan-danakas/edit-danakas.php";
							break;
						case 'del-danakas':
							include "admin/pengelolaan-danakas/del-danakas.php";
							break;
						case 'laporan-danakas':
							include "admin/pengelolaan-danakas/laporan-danakas.php";
							break;
						case 'cetak':
							include "admin/pengelolaan-danakas/cetak.php";
							break;
						case 'view-danakas':
							include "admin/pengelolaan-danakas/view-danakas.php";
							break;

						case 'danakas2':
							include "admin/pengelolaan-danakas/danakas2.php";
							break;
						case 'view-danakas2':
							include "admin/pengelolaan-danakas/view-danakas2.php";
							break;	

                    

	                    //inventaris
						case 'inventaris':
							include "admin/inventaris/inventaris.php";
							break;
						case 'add-inventaris':
							include "admin/inventaris/add-inventaris.php";
							break;
						case 'edit-inventaris':
							include "admin/inventaris/edit-inventaris.php";
							break;
						case 'del-inventaris':
							include "admin/inventaris/del-inventaris.php";
							break;
						case 'laporan-inventaris':
							include "admin/inventaris/laporan-inventaris.php";
							break;
						case 'view-inventaris':
							include "admin/inventaris/view-inventaris.php";
							break;

						case 'inventaris2':
							include "admin/inventaris/inventaris2.php";
							break;
						case 'add-inventaris2':
							include "admin/inventaris/add-inventaris2.php";
							break;
						case 'edit-inventaris2':
							include "admin/inventaris/edit-inventaris2.php";
							break;
						case 'del-inventaris2':
							include "admin/inventaris/del-inventaris2.php";
							break;
						case 'view-inventaris2':
							include "admin/inventaris/view-inventaris2.php";
							break;

							


						//penanggungjawab
						case 'data-pj':
							include "admin/data-penanggungjawab/data-pj.php";
							break;
						case 'add-pj':
							include "admin/data-penanggungjawab/add-pj.php";
							break;
						case 'edit-pj':
							include "admin/data-penanggungjawab/edit-pj.php";
							break;
						case 'del-pj':
							include "admin/data-penanggungjawab/del-pj.php";
							break;
						case 'laporan-pj':
							include "admin/data-penanggungjawab/laporan-pj.php";
							break;
						case 'update-status-pj':
							include "admin/data-penanggungjawab/update-status-pj.php";
							break;
						case 'view-pj':
							include "admin/data-penanggungjawab/view-pj.php";
							break;

						case 'data-pj2':
							include "admin/data-penanggungjawab/data-pj2.php";
							break;
						case 'add-pj2':
							include "admin/data-penanggungjawab/add-pj2.php";
							break;
						case 'edit-pj2':
							include "admin/data-penanggungjawab/edit-pj2.php";
							break;
						case 'del-pj2':
							include "admin/data-penanggungjawab/del-pj2.php";
							break;
						case 'update-jabatan-pj2':
							include "admin/data-penanggungjawab/update-jabatan-pj2.php";
							break;
						case 'view-pj2':
							include "admin/data-penanggungjawab/view-pj2.php";
							break;


				

						//arsipan
						case 'data-arsipan':
							include "admin/data-arsipan/data-arsipan.php";
							break;
						case 'add-arsipan':
							include "admin/data-arsipan/add-arsipan.php";
							break;
						case 'edit-arsipan':
							include "admin/data-arsipan/edit-arsipan.php";
							break;
						case 'del-arsipan':
							include "admin/data-arsipan/del-arsipan.php";
							break;
						case 'laporan-arsipan':
							include "admin/data-arsipan/laporan-arsipan.php";
							break;
						case 'view-arsipan':
							include "admin/data-arsipan/view-arsipan.php";
							break;

						case 'data-arsipan2':
							include "admin/data-arsipan/data-arsipan2.php";
							break;
						case 'add-arsipan2':
							include "admin/data-arsipan/add-arsipan2.php";
							break;
						case 'edit-arsipan2':
							include "admin/data-arsipan/edit-arsipan2.php";
							break;
						case 'del-arsipan2':
							include "admin/data-arsipan/del-arsipan2.php";
							break;
						case 'laporan-arsipan2':
							include "admin/data-arsipan/laporan-arsipan2.php";
							break;
						case 'view-arsipan2':
							include "admin/data-arsipan/view-arsipan2.php";
							break;

						//Pengguna
						case 'data-pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
						case 'add-pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
						case 'edit-pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
						case 'del-pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;

                        //Profil
                       case 'dokumentasi':
	                   include "admin/dokumentasi/dokumentasi.php";
	                   break;
                       
						//Profil
						case 'data-profil':
							include "admin/profil/data_profil.php";
							break;
						case 'edit-profil':
							include "admin/profil/edit_profil.php";
							break;
						// laporan
						case 'data-laporan':
							include "admin/laporan/perpanjang.php";
							break;
						case 'cetak':
							include "admin/laporan/cetak.php";
							break;
						// laporan
						case 'report':
							include "report/cetak-anggota.php";
							break;
						 case 'cetak':
						include "admin/laporan/cetak.php";
						break;
				


						//default
						default:
							echo "<center><h1>link index ERROR !</h1></center>";
							break;
					}
				} else {
					// Auto Halaman Home Pengguna
					if ($data_status == "Admin") {
						include "home/Admin.php";
					} elseif ($data_status == "Anggota") {
						include "home/Anggota.php";
					}
				}
				?>

			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
			<span>Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari Banjarmasin</span>

			<!-- All rights reserved. -->
		</div>
		<b>UKM PRAMUKA</b>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>