<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Petugas Pelayanan BBNKB
		</h3>
	</div>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kode_petugas" name="kode_petugas" placeholder="Masukkan Kode Petugas" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Nama Petugas" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Bidang Pelayanan</label>
				<div class="col-sm-6">
					<select name="id_pelayanan" id="id_pelayanan" class="form-control" data-error="wajib di isi" required>
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
				<label class="col-sm-3 col-form-label">Tahun Mulai Kerja</label>
				<div class="col-sm-6">
					<input type="number" maxlength="4" class="form-control" id="tahun_kerja" name="tahun_kerja" placeholder="Masukkan Awal Kerja" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status Pekerjaan Petugas</label>
				<div class="col-sm-6">
					<select id="status_kerja" name="status_kerja" class="form-control" required>
						<option>-Pilih Status Petugas-</option>
						<option value="PNS">PNS</option>
						<option value="Kontrak">Kontrak</option>
						<option value="Honorer">Honorer</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-petugas_bbnkb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

include "inc/koneksi.php";

if (isset($_POST['simpan'])) {
	$kode_petugas = $_POST['kode_petugas'];
	$nama_petugas = $_POST['nama_petugas'];
	$id_pelayanan = $_POST['id_pelayanan'];
	$tahun_kerja = $_POST['tahun_kerja'];
	$status_kerja = $_POST['status_kerja'];

	//mulai proses simpan data

	$sql_check_data = mysqli_query($koneksi, "SELECT * FROM tb_petugas_bbnkb WHERE kode_petugas='$kode_petugas'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($sql_check_data) > 0) {
		echo "<script>
		Swal.fire({title: 'Data Ini Sudah Ada',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-petugas_bbnkb';
			}
		})</script>";
	} else {
		$query = mysqli_query($link, "INSERT INTO tb_petugas_bbnkb(kode_petugas, nama_petugas, id_pelayanan, tahun_kerja, status_kerja) VALUES('$kode_petugas','$nama_petugas','$id_pelayanan','$tahun_kerja','$status_kerja')");
		if ($query) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-petugas_bbnkb';
				}
			})</script>";
		} else {
			//Pengecekan eror sql
			// $isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
			// echo $isi;
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-petugas_bbnkb';
				}
			})</script>";
		}
	}
}
     //selesai proses simpan data
