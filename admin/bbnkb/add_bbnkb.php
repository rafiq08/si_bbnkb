<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Administrasi BBNKB
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
				<label class="col-sm-3 col-form-label">Nomor Polisi Terdahulu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol_lama" name="nopol_lama" placeholder="Masukkan Nomor Polisi Terdahulu" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Polisi yang Baru</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nopol_baru" name="nopol_baru" placeholder="Masukkan Nomor Polisi yang Baru" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik STNK Terdahulu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_lama" name="nama_lama" placeholder="Masukkan Nama Pemilik STNK Terdahulu" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pemilik STNK yang Baru</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_baru" name="nama_baru" placeholder="Masukkan Nama Pemilik STNK Baru" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Pengurusan</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" placeholder="tgl_daftar" name="tgl_daftar" data-error="wajib di isi" required>
					<div class="help-block with-errors"></div>
				</div>
			</div>



		</div>
		<div class="card-footer">
			<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-bbnkb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

include "inc/koneksi.php";

if (isset($_POST['simpan'])) {
	$id_petugas_bbnkb = $_POST['id_petugas_bbnkb'];	
	$nopol_lama = $_POST['nopol_lama'];
	$nopol_baru = $_POST['nopol_baru'];
	$nama_lama = $_POST['nama_lama'];
	$nama_baru = $_POST['nama_baru'];
	$tgl_daftar = $_POST['tgl_daftar'];

	//mulai proses simpan data

	$query = mysqli_query($link, "INSERT INTO tb_bbnkb(id_petugas_bbnkb, nopol_lama, nopol_baru, nama_lama, nama_baru, tgl_daftar) VALUES('$id_petugas_bbnkb','$nopol_lama','$nopol_baru','$nama_lama','$nama_baru','$tgl_daftar')");


	if ($query) {
		echo "<script>
	Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {if (result.value){
		window.location = 'index.php?page=data-bbnkb';
		}
	})</script>";
	} else {
		//Pengecekan eror sql
		// $isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
		// echo $isi;
		echo "<script>
	Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {if (result.value){
		window.location = 'index.php?page=add-bbnkb';
		}
	})</script>";
	}
}
     //selesai proses simpan data
