<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pemutihan, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.tanggal, m.no_antri from 
	tb_pemutihan m inner join tb_petugas_bbnkb p on  p.id_petugas_bbnkb=m.id_petugas_bbnkb WHERE id_pemutihan='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Detail Data Pemutihan Pajak
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_petugas_bbnkb" name="id_petugas_bbnkb" value="<?php echo $data_cek['nama_petugas']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Polisi</label>
				<div class="col-sm-6">
					<input type="" class="form-control" id="nopol" name="nopol" value="<?php echo $data_cek['nopol']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pemilik STNK</label>
				<div class="col-sm-6">
					<input type="" class="form-control" id="nama_stnk" name="nama_stnk" value="<?php echo $data_cek['nama_stnk']; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Daftar</label>
				<div class="col-sm-2">
					<input type="" class="form-control" name="tanggal" data-error="wajib di isi" value="<?php echo $data_cek['tanggal']; ?>" readonly required>
					<div class="help-block with-errors"></div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Antrian</label>
				<div class="col-sm-6">
					<input type="" class="form-control" name="tanggal" data-error="wajib di isi" value="<?php echo $data_cek['no_antri']; ?>" readonly required>
					<div class="help-block with-errors"></div>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<a href="?page=data-pemutihan" title="Kembali" class="btn btn-info">Kembali</a>
		</div>
	</form>
</div>