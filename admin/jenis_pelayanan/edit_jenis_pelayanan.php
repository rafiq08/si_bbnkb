<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pelayanan WHERE id_pelayanan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Jenis Pelayanan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="id_pelayanan" value="<?php echo $data_cek['id_pelayanan']; ?>"
			 readonly/>

             <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pelayanan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="bidang_pelayanan" name="bidang_pelayanan" placeholder="Masukkan Nama Bidang Pelayanan" value="<?php echo $data_cek['bidang_pelayanan']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Estimasi Waktu Pengerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="waktu_penyelesaian" name="waktu_penyelesaian" value="<?php echo $data_cek['waktu_penyelesaian']; ?>" placeholder="Masukkan Estimasi Waktu Penyelesaian" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam Pelayanan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jam_pelayanan" name="jam_pelayanan" value="<?php echo $data_cek['jam_pelayanan']; ?>" placeholder="Masukkan Jam Pelayanan" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Update" class="btn btn-success">
			<a href="?page=data-jenis_pelayanan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pelayanan SET
        bidang_pelayanan='".$_POST['bidang_pelayanan']."',
        waktu_penyelesaian='".$_POST['waktu_penyelesaian']."',
        jam_pelayanan='".$_POST['jam_pelayanan']."'
        WHERE id_pelayanan='".$_POST['id_pelayanan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-jenis_pelayanan';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-jenis_pelayanan';
        }
      })</script>";
    }}
?>

<script type="text/javascript">
    function change()
    {
    var x = document.getElementById('pass').type;

    if (x == 'password')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>