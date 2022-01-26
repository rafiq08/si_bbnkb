<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_pelayanan, p.bidang_pelayanan, m.id_petugas_bbnkb, m.kode_petugas, m.nama_petugas, m.id_pelayanan, m.tahun_kerja, m.status_kerja from tb_petugas_bbnkb m inner join tb_pelayanan p on p.id_pelayanan=m.id_pelayanan WHERE id_petugas_bbnkb='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<?php if ($data_cek) : ?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Petugas Pelayanan BBNKB
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_petugas_bbnkb" name="id_petugas_bbnkb" value="<?php echo $data_cek['id_petugas_bbnkb']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?php echo $data_cek['nama_petugas']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Bidang Pelayanan</label>
				<div class="col-sm-6">
					<select name="id_pelayanan" id="id_pelayanan" class="form-control" data-error="wajib di isi" value="<?php echo $data_cek['bidang']; ?>" required>
						<option selected="selected">- Pilih Bidang Pelayanan-</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_pelayanan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_pelayanan'] ?>">
								<?php echo $row['bidang_pelayanan'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tahun Awal Kerja</label>
				<div class="col-sm-6">
					<input type="int" maxlength="4" class="form-control" id="tahun_kerja" name="tahun_kerja" value="<?php echo $data_cek['tahun_kerja']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status Pekerjaan Petugas</label>
				<div class="col-sm-6">
					<select id="status_kerja" name="status_kerja" class="form-control" value="<?php echo $data_cek['status_kerja']; ?>" required>
						<option>-Pilih Status-</option>
						<option value="PNS">PNS</option>
						<option value="Kontrak">Kontrak</option>
						<option value="Honorer">Honorer</option>
					</select>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Update" class="btn btn-success">
			<a href="?page=data-petugas_bbnkb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php else : ?>
	<h3 class="text-center">Data Tidak Ditemukan</h3>
	<div class="text-center">
		<a href="?page=data-pemutihan" class="btn btn-sm btn-primary">Kembali</a>
	</div>
<?php endif ?>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_petugas_bbnkb SET 
		id_petugas_bbnkb='" . $_POST['id_petugas_bbnkb'] . "',		
		nama_petugas='" . $_POST['nama_petugas'] . "',
		id_pelayanan='" . $_POST['id_pelayanan'] . "',
		tahun_kerja='" . $_POST['tahun_kerja'] . "',
		status_kerja='" . $_POST['status_kerja'] . "'
		WHERE id_petugas_bbnkb='" . $data_cek['id_petugas_bbnkb'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-petugas_bbnkb';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-petugas_bbnkb';
        }
      })</script>";
	}
}
