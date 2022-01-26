<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pindah, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.alamat_lama, m.alamat_baru, m.tgl from tb_pindah_bjm_i m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb WHERE id_pindah='" . $_GET['kode'] . "'";
	// $sql_cek = "SELECT * from tb_pindah_bjm_i  WHERE id_pindah='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Detail Data Pindah BJM I Ke BJM II
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_petugas_bbnkb" name="id_petugas_bbnkb" value="<?php echo $data_cek['nama_petugas']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Polisi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol" name="nopol" value="<?php echo $data_cek['nopol']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik STNK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_stnk" name="nama_stnk" value="<?php echo $data_cek['nama_stnk']; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Lama</label>
				<div class="col-sm-6">
					<textarea style="resize:none;width:630px;height:70px;" name="alamat_lama" class="form-control" id="alamat_lama" value="<?php echo $data_cek['id_pindah']; ?>" required readonly><?php echo $data_cek['alamat_lama']; ?></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Baru</label>
				<div class="col-sm-6">
					<textarea style="resize:none;width:630px;height:70px;" name="alamat_baru" class="form-control" id="alamat_baru" value="<?php echo $data_cek['id_pindah']; ?>" required readonly><?php echo $data_cek['alamat_baru']; ?></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Pengurusan Pindah</label>
				<div class="col-sm-2">
					<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukkan Nama Pemilik STNK" value="<?php echo $data_cek['tgl']; ?>" required readonly>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<a href="?page=data-pindah_i" title="Kembali" class="btn btn-info">Kembali</a>
		</div>
	</form>
</div>