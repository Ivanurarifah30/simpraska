<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Inventaris Kabag Racana</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-inventaris " class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>

					
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th>kondisi</th>
						<th>Keterangan</th>
						<th>Tgl Pengecekan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_inventaris");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_barang']; ?>
						</td>
						<td>
							<?php echo $data['jumlah']; ?>
						</td>
						<td>
							<?php echo $data['kondisi']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
							<?php echo $data['tgl_pengecekan']; ?>
						</td>
						<td>
							<a href="?page=view-inventaris2 &kode=<?php echo $data['id_barang']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-inventaris2 &kode=<?php echo $data['id_barang']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-inventaris2 &kode=<?php echo $data['id_barang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
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