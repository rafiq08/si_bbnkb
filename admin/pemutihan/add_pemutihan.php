<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Pemutihan Pajak
		</h3>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
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
								<option value="<?php echo $row['id_petugas_bbnkb'] ?>">
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
					<input type="text" class="form-control" id="nopol" name="nopol" placeholder="Masukkan Nomor Polisi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pemilik STNK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_stnk" name="nama_stnk" placeholder="Masukkan Nama Pemilik STNK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Daftar</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" placeholder="tanggal" name="tanggal" data-error="wajib di isi" required>
					<div class="help-block with-errors"></div>
				</div>
			</div>


		</div>
		<div class="card-footer">
			<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pemutihan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

include "inc/koneksi.php";

if (isset($_POST['simpan'])) {
	$id_petugas_bbnkb = $_POST['id_petugas_bbnkb'];
	$nopol = $_POST['nopol'];
	$nama_stnk = $_POST['nama_stnk'];
	$tanggal = $_POST['tanggal'];


	//mulai proses simpan data
	$sql_check_data = mysqli_query($koneksi, "SELECT * FROM tb_pemutihan WHERE nopol='$nopol'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($sql_check_data) > 0) {
		echo "<script>
		Swal.fire({title: 'Data Ini Sudah Ada',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-pemutihan';
			}
		})</script>";
	} else {
		$query = mysqli_query($link, "INSERT INTO tb_pemutihan(id_petugas_bbnkb, nopol, nama_stnk, tanggal) VALUES('$id_petugas_bbnkb','$nopol','$nama_stnk','$tanggal')");
		if ($query) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-pemutihan';
				}
			})</script>";
		} else {
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-pemutihan';
				}
			})</script>";
		}
	}
}
     //selesai proses simpan data
