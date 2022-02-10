<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Pindah Banjarmasin II Ke Banjarmasin I
		</h3>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<select name="id_petugas_bbnkb" id="id_petugas_bbnkb" class="form-control" data-error="wajib di isi" required>
						<option selected="selected">- Pilih Petugas-</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_petugas_bbnkb";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<?php if ($row['id_pelayanan'] == '2') : ?>
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
				<label class="col-sm-3 col-form-label">Nomor Polisi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol" name="nopol" placeholder="Masukkan Nomor Polisi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik STNK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_stnk" name="nama_stnk" placeholder="Masukkan Nama Pemilik STNK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Lama</label>
				<div class="col-sm-6">
					<textarea style="resize:none;width:630px;height:70px;" name="alamat_lama" class="form-control" id="alamat_lama" required></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Baru</label>
				<div class="col-sm-6">
					<textarea style="resize:none;width:630px;height:70px;" name="alamat_baru" class="form-control" id="alamat_baru" required></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Pengurusan Pindah</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukkan Nama Pemilik STNK" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pindah_ii" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

include "inc/koneksi.php";

if (isset($_POST['simpan'])) {
	$id_petugas_bbnkb = $_POST['id_petugas_bbnkb'];
	$nopol = $_POST['nopol'];
	$nama_stnk = $_POST['nama_stnk'];
	$alamat_lama = $_POST['alamat_lama'];
	$alamat_baru = $_POST['alamat_baru'];
	$tgl = $_POST['tgl'];

	//mulai proses simpan data
	$sql_check_data = mysqli_query($koneksi, "SELECT * FROM tb_pindah_bjm_ii WHERE nopol='$nopol'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($sql_check_data) > 0) {
		echo "<script>
		Swal.fire({title: 'Data Ini Sudah Ada',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-pindah_ii';
			}
		})</script>";
	} else {
		$query = mysqli_query($link, "INSERT INTO tb_pindah_bjm_ii(id_petugas_bbnkb, nopol, nama_stnk, alamat_lama, alamat_baru, tgl) VALUES('$id_petugas_bbnkb','$nopol','$nama_stnk','$alamat_lama','$alamat_baru','$tgl')");
		if ($query) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-pindah_ii';
				}
			})</script>";
		} else {
			//Pengecekan eror sql
			// $isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
			// echo $isi;
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-pindah_ii';
				}
			})</script>";
		}
	}
}
     //selesai proses simpan data
