<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Laporan Inventaris Kabag Racana
		</h3>
	</div>

	<?php
	// Load file koneksi.php
	include "koneksi.php";

	// Query untuk mendapatkan semua data dari tb_inventaris
	$query = "SELECT id_barang, nama_barang, jumlah, kondisi, keterangan, tgl_pengecekan FROM tb_inventaris";
	$url_cetak = "admin/inventaris/cetak.php";
	$label = "";
	?>

	<div style="padding: 15px;">
		<form method="POST">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
						<!-- Placeholder untuk form filter jika diperlukan -->
					</div>
				</div>
			</div>
		</form>
		<div>
			<h6 style="margin-left: auto;"><b>Laporan Inventaris</b>
				<?php echo $label ?>
			</h6>
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
						<tr style="background-color: #343A40; color: aliceblue;">
							<th>No</th>
							<th>ID</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Kondisi</th>
							<th>Keterangan</th>
							<th>Tgl Pengecekan</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi query
						$row = mysqli_num_rows($sql); // Ambil jumlah data
						if ($row > 0) { // Jika jumlah data lebih dari 0
							while ($data = mysqli_fetch_array($sql)) { // Ambil semua data
								echo "<tr>";
								echo "<td>" . $no++ . "</td>";	
								echo "<td>" . $data['id_barang'] . "</td>";
								echo "<td>" . $data['nama_barang'] . "</td>";
								echo "<td>" . $data['jumlah'] . "</td>";
								echo "<td>" . $data['kondisi'] . "</td>";
								echo "<td>" . $data['keterangan'] . "</td>";
								echo "<td>" . $data['tgl_pengecekan'] . "</td>";
								echo "</tr>";
							}
						} else { // Jika data tidak ada
							echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
						}
						?>
					</tbody>
				</table>
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
</div>
