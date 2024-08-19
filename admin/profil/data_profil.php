<!-- Tambahkan CSS Kustom -->
<style>
    .card-header {
        background-color: #007bff;
        color: white;
        padding: 15px;
        border-bottom: 1px solid #007bff;
    }

    .card-title {
        font-size: 1.5rem;
    }

    .table thead th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    .btn-custom {
        background-color: #28a745;
        color: white;
    }

    .btn-custom:hover {
        background-color: #218838;
        color: white;
    }
</style>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Profil
        </h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="table-responsive">
            <table id="profilTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Unit Kegiatan Mahasiswa</th>
                        <th>Racana</th>
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                   
				<?php
				$no = 1;
				$sql = $koneksi->query("select * from tb_profil");
				while ($data = $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $data['ukm']; ?>
						</td>
						<td>
							<?php echo $data['racana']; ?>
						</td>
						<td>
							<?php echo $data['nama_instansi']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<a href="?page=edit-profil&kode=<?php echo $data['id_profil']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-wrench"></i>
							</a>
						</td>
					</tr>

				<?php
				}
				?>
			</tbody>
			</tfoot>
		</table>
	</div>
</div>
<!-- /.card-body -->
