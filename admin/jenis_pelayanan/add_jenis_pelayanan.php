<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Jenis Pelayanan
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang Pelayanan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="bidang_pelayanan" name="bidang_pelayanan" placeholder="Masukkan Nama Bidang Pelayanan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Estimasi Waktu Pengerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="waktu_penyelesaian" name="waktu_penyelesaian" placeholder="Masukkan Estimasi Waktu Penyelesaian" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam Pelayanan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jam_pelayanan" name="jam_pelayanan" placeholder="Masukkan Jam Pelayanan" required>
				</div>
			</div>			

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-jenis_pelayanan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

include "inc/koneksi.php";

if (isset($_POST['Simpan'])) {

	$bidang_pelayanan = $_POST['bidang_pelayanan'];
	$waktu_penyelesaian = $_POST['waktu_penyelesaian'];	
	$jam_pelayanan = $_POST['jam_pelayanan'];	

	//mulai proses simpan data

	$query = mysqli_query($link, "INSERT INTO tb_pelayanan(bidang_pelayanan, waktu_penyelesaian, jam_pelayanan) VALUES('$bidang_pelayanan','$waktu_penyelesaian','$jam_pelayanan')");


	if ($query) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-jenis_pelayanan';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-jenis_pelayanan';
          }
      })</script>";
	}
}
     //selesai proses simpan data
