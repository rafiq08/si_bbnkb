<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-book"></i> Data Jenis Pelayanan
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-jenis_pelayanan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Bidang Pelayanan</th>
						<th>Estimasi Waktu Penyelesaian</th>
						<th>Jam Pelayanan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_pelayanan");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr class="text-center">
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['bidang_pelayanan']; ?>
							</td>
							<td>
								<?php echo $data['waktu_penyelesaian']; ?>
							</td>
							<td>
								<?php echo $data['jam_pelayanan']; ?>
							</td>
							<td>								
								<a href="?page=edit-jenis_pelayanan&kode=<?php echo $data['id_pelayanan']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-jenis_pelayanan&kode=<?php echo $data['id_pelayanan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
									</>
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