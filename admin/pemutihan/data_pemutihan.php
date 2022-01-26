<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-motorcycle"></i> Data Administrasi Pemutihan Pajak Kendaraan Bermotor
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pemutihan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Nama Petugas</th>
						<th>Nomor Polisi</th>
						<th>Nama Pemilik STNK</th>
						<th>Tanggal Pendaftaran Pajak</th>						
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$koneksi = new mysqli("localhost", "root", "", "db_bbnkb");
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pemutihan, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.tanggal from 
					tb_pemutihan m inner join tb_petugas_bbnkb p on  p.id_petugas_bbnkb=m.id_petugas_bbnkb");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr class="text-center">
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_petugas']; ?>
							</td>
							<td>
								<?php echo $data['nopol']; ?>
							</td>
							<td>
								<?php echo $data['nama_stnk']; ?>
							</td>
							<td>
								<?php echo $data['tanggal']; ?>
							</td>
							<td class="text-center">								
								<a href="?page=edit-pemutihan&kode=<?php echo $data['id_pemutihan']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pemutihan&kode=<?php echo $data['id_pemutihan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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