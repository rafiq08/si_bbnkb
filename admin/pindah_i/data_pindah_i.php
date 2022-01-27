<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pindah Banjarmasin I Ke Banjarmasin II
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pindah_i" class="btn btn-primary">
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
						<th>Alamat Sebelum</th>
						<th>Alamat Baru</th>
						<th>Tanggal Pengurusan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$koneksi = new mysqli("localhost", "root", "", "db_bbnkb");
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pindah, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.alamat_lama, m.alamat_baru, m.tgl from 
			  		tb_pindah_bjm_i m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb");
					// $sql = $koneksi->query("SELECT * FROM tb_pindah_bjm_i ORDER BY tgl ASC");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td class="text-center">
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_petugas']; ?>
							</td>
							<td class="text-center">
								<?php echo $data['nopol']; ?>
							</td>
							<td>
								<?php echo $data['nama_stnk']; ?>
							</td>
							<td>
								<?php echo $data['alamat_lama']; ?>
							</td>
							<td>
								<?php echo $data['alamat_baru']; ?>
							</td>
							<td class="text-center">
								<?php echo $data['tgl']; ?>
							</td>

							<td class="text-center">								
								<a href="?page=edit-pindah_i&kode=<?php echo $data['id_pindah']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pindah_i&kode=<?php echo $data['id_pindah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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