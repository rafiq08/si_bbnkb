<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_pelayanan, p.bidang_pelayanan, m.id_petugas_bbnkb, m.kode_petugas, m.nama_petugas, m.id_pelayanan, m.tahun_kerja, m.status_kerja from tb_petugas_bbnkb m inner join tb_pelayanan p on p.id_pelayanan=m.id_pelayanan WHERE id_petugas_bbnkb='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Detail Data Petugas Pelayanan BBNKB
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_petugas_bbnkb" name="id_petugas_bbnkb" readonly value="<?php echo $data_cek['id_petugas_bbnkb']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_petugas" name="nama_petugas" readonly value="<?php echo $data_cek['nama_petugas']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Bidang Pelayanan Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="bidang" name="bidang" readonly value="<?php echo $data_cek['bidang_pelayanan']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tahun Awal Kerja</label>
				<div class="col-sm-6">
					<input type="int" maxlength="4" class="form-control" id="tahun_kerja" name="tahun_kerja" readonly value="<?php echo $data_cek['tahun_kerja']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status Pekerjaan Petugas</label>
				<div class="col-sm-6">
					<input id="status_kerja" readonly name="status_kerja" class="form-control" value="<?php echo $data_cek['status_kerja']; ?>" required>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<a href="?page=data-petugas_bbnkb" title="Kembali" class="btn btn-info">Kembali</a>
		</div>
	</form>
</div>