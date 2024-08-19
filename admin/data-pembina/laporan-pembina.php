<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Majelis Pembimbing dan Pembina Pramuka</title>
	<!-- Include CSS Bootstrap -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Include library Bootstrap Datepicker -->
	<link rel="stylesheet" href="../assets/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
</head>
<body>
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> Laporan Majelis Pembimbing dan Pembina Pramuka
			</h3>
		</div>

		<?php
		// Load file koneksi.php
		include "koneksi.php";

		// Query SQL yang benar untuk memilih semua kolom yang diperlukan
		$query = "SELECT nip, nama, status, jabatan, no_telp FROM tb_pembina";
		$url_cetak = "admin/data-pembina/cetak.php";
		$label = "";
		?>

		<div style="padding: 15px;">
			<form method="POST">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<!-- Form Filter dapat ditambahkan di sini jika diperlukan -->
						</div>
					</div>
				</div>
			</form>
			<div>
				<h6 style="margin-left: auto;"><b>Laporan Pembina</b> <?php echo $label ?></h6>
				<a href="<?php echo $url_cetak ?>">
					<button class="btn btn-success">Cetak PDF</button>
				</a>
			</div>
			<hr />
			<div class="card-body">
				<div class="table-responsive" style="margin-top: auto;">
					<br>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>NAMA</th>
								<th>Status</th>
								<th>Jabatan</th>
								<th>No Telp</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
							$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
							if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
								while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
									echo "<tr>";
									echo "<td>" . $no++ . "</td>";	
									echo "<td>" . $data['nip'] . "</td>";		
									echo "<td>" . $data['nama'] . "</td>";
									echo "<td>" . $data['status'] . "</td>";
									echo "<td>" . $data['jabatan'] . "</td>";
									echo "<td>" . $data['no_telp'] . "</td>";
									echo "</tr>";
								}
							} else { // Jika data tidak ada
								echo "<tr><td colspan='12'>Data tidak ada</td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Include File JS Bootstrap -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<!-- Include library Bootstrap Datepicker -->
	<script src="../assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<!-- Include File JS Custom (untuk fungsi Datepicker) -->
	<script src="../assets/js/custom.js"></script>
	<script>
		$(document).ready(function() {
			setDateRangePicker(".tgl_awal", ".tgl_akhir")
		})
	</script>
</body>
</html>
