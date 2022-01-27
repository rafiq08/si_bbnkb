<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data User
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-4">
					<select name="level" id="level" class="form-control" required>
						<option>- Pilih Level -</option>
						<option>Administrator</option>
						<option>KASI Pelayanan PKB & BBNKB</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-user" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

include "inc/koneksi.php";

if (isset($_POST['Simpan'])) {

	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$md5 = md5($password);
	$level = $_POST['level'];

	//mulai proses simpan data

	$query = mysqli_query($link, "INSERT INTO tb_user(nama, username, password, level) VALUES('$nama','$username','$md5','$level')");

	if ($query) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-user';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-user';
          }
      })</script>";
	}
}
     //selesai proses simpan data
