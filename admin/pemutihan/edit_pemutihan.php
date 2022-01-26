<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pemutihan, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.tanggal from 
	tb_pemutihan m inner join tb_petugas_bbnkb p on  p.id_petugas_bbnkb=m.id_petugas_bbnkb WHERE id_pemutihan='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

function set_select($value, $old)
{
	if ($value == $old) return "selected";
	return "";
}
?>
<?php if ($data_cek) : ?>
	<div class="card card-success">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Ubah Data Pemutihan Pajak
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Petugas</label>
					<div class="col-sm-6">
						<select name="id_petugas_bbnkb" id="id_petugas_bbnkb" class="form-control" data-error="wajib di isi" required>
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
					<label class="col-sm-2 col-form-label">Nomor Polisi</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nopol" name="nopol" value="<?php echo $data_cek['nopol']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Pemilik STNK</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama_stnk" name="nama_stnk" value="<?php echo $data_cek['nama_stnk']; ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Daftar</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" name="tanggal" data-error="wajib di isi" value="<?php echo $data_cek['tanggal']; ?>" required>
						<div class="help-block with-errors"></div>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Ubah" value="Update" class="btn btn-success">
				<a href="?page=data-pemutihan" title="Kembali" class="btn btn-secondary">Batal</a>
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
	$sql_ubah = "UPDATE tb_pemutihan SET 
		id_petugas_bbnkb='" . $_POST['id_petugas_bbnkb'] . "',
		nopol='" . $_POST['nopol'] . "',
		nama_stnk='" . $_POST['nama_stnk'] . "',
		tanggal='" . $_POST['tanggal'] . "'		
		WHERE id_pemutihan='" . $data_cek['id_pemutihan'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemutihan';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemutihan';
        }
      })</script>";
	}
}
