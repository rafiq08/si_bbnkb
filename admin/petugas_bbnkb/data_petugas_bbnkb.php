<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Data Petugas Pelayanan BBN-KB
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-petugas_bbnkb" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Kode Petugas</th>
						<th>Nama Petugas</th>
						<th>Bidang Pelayanan</th>
						<th>Tahun Awal Kerja</th>
						<th>Status Pekerjaan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$koneksi = new mysqli("localhost", "root", "", "db_bbnkb");
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_pelayanan, p.bidang_pelayanan, m.id_petugas_bbnkb, m.kode_petugas, m.nama_petugas, m.id_pelayanan, m.tahun_kerja, m.status_kerja from tb_petugas_bbnkb m inner join tb_pelayanan p on p.id_pelayanan=m.id_pelayanan");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr class="text-center">
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['kode_petugas']; ?>
							</td>
							<td>
								<?php echo $data['nama_petugas']; ?>
							</td>
							<td>
								<?php echo $data['bidang_pelayanan']; ?>
							</td>
							<td>
								<?php echo $data['tahun_kerja']; ?>
							</td>
							<td>
								<?php echo $data['status_kerja']; ?>
							</td>

							<td>								
								<a href="?page=edit-petugas_bbnkb&kode=<?php echo $data['id_petugas_bbnkb']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-petugas_bbnkb&kode=<?php echo $data['id_petugas_bbnkb']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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