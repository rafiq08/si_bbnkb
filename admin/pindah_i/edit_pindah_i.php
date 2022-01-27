<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pindah, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.alamat_lama, m.alamat_baru, m.tgl from tb_pindah_bjm_i m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb WHERE id_pindah='" . $_GET['kode'] . "'";
	// $sql_cek = "SELECT * from tb_pindah_bjm_i WHERE id_pindah='" . $_GET['kode'] . "'";
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
			<i class="fa fa-edit"></i> Ubah Data Pindah Banjarmasin I Ke Banjarmasin II
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<select name="id_petugas_bbnkb" id="id_petugas_bbnkb" class="form-control" data-error="wajib di isi" value="<?php echo $data_cek['nama_petugas']; ?>" required>
						<option selected="selected">- Pilih Nama Petugas-</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_petugas_bbnkb";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<?php if ($row['id_pelayanan'] == '2') : ?>
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
				<label class="col-sm-3 col-form-label">Nomor Polisi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol" name="nopol" value="<?php echo $data_cek['nopol']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik STNK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_stnk" name="nama_stnk" value="<?php echo $data_cek['nama_stnk']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Lama</label>
				<div class="col-sm-6">
					<textarea style="resize:none;width:630px;height:70px;" name="alamat_lama" class="form-control" id="alamat_lama" value="<?php echo $data_cek['id_pindah']; ?>" required><?php echo $data_cek['alamat_lama']; ?></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Baru</label>
				<div class="col-sm-6">
					<textarea style="resize:none;width:630px;height:70px;" name="alamat_baru" class="form-control" id="alamat_baru" value="<?php echo $data_cek['id_pindah']; ?>" required><?php echo $data_cek['alamat_baru']; ?></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Pengurusan Pindah</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukkan Nama Pemilik STNK" value="<?php echo $data_cek['tgl']; ?>" required>
				</div>
			</div>
</div>
<div class="card-footer">
	<input type="submit" name="Ubah" value="Update" class="btn btn-success">
	<a href="?page=data-pindah_i" title="Kembali" class="btn btn-secondary">Batal</a>
</div>
</form>
</div>

<?php else : ?>
	<h3 class="text-center">Data Tidak Ditemukan</h3>
	<div class="text-center">
		<a href="?page=data-pindah_i" class="btn btn-sm btn-primary">Kembali</a>
	</div>
<?php endif ?>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_pindah_bjm_i SET 
		id_petugas_bbnkb ='" . $_POST['id_petugas_bbnkb'] . "',
		nopol='" . $_POST['nopol'] . "',		
		nama_stnk='" . $_POST['nama_stnk'] . "',
		alamat_lama='" . $_POST['alamat_lama'] . "',
		alamat_baru='" . $_POST['alamat_baru'] . "',
		tgl='" . $_POST['tgl'] . "'
		WHERE id_pindah='" . $data_cek['id_pindah'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pindah_i';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pindah_i';
        }
      })</script>";
	}
}
