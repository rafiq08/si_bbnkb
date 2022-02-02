<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Data Administrasi Pada Pelayanan BBNKB
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-bbnkb" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Nama Petugas</th>
						<th>Nopol Lama</th>
						<th>Nopol Baru</th>
						<th>Nama Lama</th>
						<th>Nama Baru</th>
						<th>Tanggal </th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$koneksi = new mysqli("localhost", "root", "", "db_bbnkb");
					$no = 1;					
					$sql = $koneksi->query("SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja,  m.id_bbnkb, m.id_petugas_bbnkb, m.nopol_lama, m.nopol_baru, m.nama_lama, m.nama_baru, m.tgl_daftar from tb_bbnkb m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr class="text-center">
							<td>
								<?php echo $no++; ?>
							</td>
							<td >								
								<?php echo $data['nama_petugas'] ?>
							</td>							
							<td>
								<?php echo $data['nopol_lama']; ?>
							</td>
							<td >
								<?php echo $data['nopol_baru']; ?>
							</td>
							<td>
								<?php echo $data['nama_lama']; ?>
							</td>
							<td>
								<?php echo $data['nama_baru']; ?>
							</td>
							<td>
								<?php echo $data['tgl_daftar']; ?>
							</td>

							<td class="text-center">								
								<a href="?page=edit-bbnkb&kode=<?php echo $data['id_bbnkb']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-bbnkb&kode=<?php echo $data['id_bbnkb']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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