<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_bbnkb, m.nopol_lama, m.nopol_baru, m.nama_lama, m.nama_baru, m.tgl_daftar from tb_bbnkb m 
	inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb WHERE id_bbnkb='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Detail Data Administrasi BBNKB
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_petugas_bbnkb" name="id_petugas_bbnkb" value="<?php echo $data_cek['nama_petugas']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Pelayanan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jenis_pelayanan" name="jenis_pelayanan" value="<?php echo $data_cek['bidang_pelayanan']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Polisi Terdahulu</label>
				<div class="col-sm-6">
					<input type="" class="form-control" id="nopol_lama" name="nopol_lama" value="<?php echo $data_cek['nopol_lama']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Polisi yang Baru</label>
				<div class="col-sm-6">
					<input type="" class="form-control" id="nopol_baru" name="nopol_baru" value="<?php echo $data_cek['nopol_baru']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik Terdahulu</label>
				<div class="col-sm-6">
					<input type="" class="form-control" id="nama_lama" name="nama_lama" value="<?php echo $data_cek['nama_lama']; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik yang Baru</label>
				<div class="col-sm-6">
					<input type="" class="form-control" id="nama_baru" name="nama_baru" value="<?php echo $data_cek['nama_baru']; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Daftar Pembayaran</label>
				<div class="col-sm-2">
					<input type="" class="form-control" name="tgl_daftar" data-error="wajib di isi" value="<?php echo $data_cek['tgl_daftar']; ?>" readonly required>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="?page=data-bbnkb" title="Kembali" class="btn btn-info">Kembali</a>
		</div>
	</form>
</div>