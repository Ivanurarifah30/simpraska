<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i>  Arsipan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
		<div>
				<a href="?page=add-arsipan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
				<a href="?page=data-arsipan" class="btn btn-info">
                    <i class="fa fa-edit"></i> Semua  Arsipan
                </a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama File</th>
						<th>Tahun</th>
						<th>Kategori</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_arsipan");
					while ($data = $sql->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nama_file']; ?></td>
						<td><?php echo $data['tahun']; ?></td>
						<td><?php echo $data['kategori']; ?></td>
						<td><?php echo $data['keterangan']; ?></td>
						<td>
							<a href="?page=view-arsipan&kode=<?php echo $data['id_data']; ?>" title="Detail" class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<a href="?page=edit-arsipan&kode=<?php echo $data['id_data']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-arsipan&kode=<?php echo $data['id_data']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
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
</div>
