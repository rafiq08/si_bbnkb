<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja,  m.id_bbnkb, m.nopol_lama, m.nopol_baru, m.nama_lama, m.nama_baru, m.tgl_daftar from tb_bbnkb m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb WHERE id_bbnkb='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

	function set_select($value, $old) {
		if($value == $old) return "selected";
		return "";
	}
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Administrasi BBNKB
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<select name="id_petugas_bbnkb" id="id_petugas_bbnkb" class="form-control" data-error="wajib di isi" value="<?php echo $data_cek['nama_petugas']; ?>" required>
						<option selected="selected">- Pilih Petugas-</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_petugas_bbnkb";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<?php if ($row['id_pelayanan'] == '1') : ?>
								<option <?= set_select($row['id_petugas_bbnkb'], $data_cek['id_petugas_bbnkb']) ?> value="<?php echo $row['id_petugas_bbnkb'] ?>">
									<?php echo $row['nama_petugas'] ?>
								</option>
							<?php endif ?>
						<?php
						}
						?>
					</select>
				</div>
			</div>			
			
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Polisi Terdahulu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol_lama" name="nopol_lama" value="<?php echo $data_cek['nopol_lama']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Polisi yang Baru</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol_baru" name="nopol_baru" value="<?php echo $data_cek['nopol_baru']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik Terdahulu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_lama" name="nama_lama" value="<?php echo $data_cek['nama_lama']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik yang Baru</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_baru" name="nama_baru" value="<?php echo $data_cek['nama_baru']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Daftar Pembayaran</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" name="tgl_daftar" data-error="wajib di isi" value="<?php echo $data_cek['tgl_daftar']; ?>" required>
					<div class="help-block with-errors"></div>
				</div>
			</div>		
</div>
<div class="card-footer">
	<input type="submit" name="Ubah" value="Update" class="btn btn-success">
	<a href="?page=data-bbnkb" title="Kembali" class="btn btn-secondary">Batal</a>
</div>
</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_bbnkb SET 
		id_petugas_bbnkb='" . $_POST['id_petugas_bbnkb'] . "',
		jenis_pelayanan='" . $_POST['jenis_pelayanan'] . "',
		nopol_lama='" . $_POST['nopol_lama'] . "',
		nopol_baru='" . $_POST['nopol_baru'] . "',
		nama_lama='" . $_POST['nama_lama'] . "',
		nama_baru='" . $_POST['nama_baru'] . "',
		tgl_daftar='" . $_POST['tgl_daftar'] . "'
		WHERE id_bbnkb='" . $data_cek['id_bbnkb'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-bbnkb';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-bbnkb';
        }
      })</script>";
	}
}
