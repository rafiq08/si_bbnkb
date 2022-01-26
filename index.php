<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi Pendataan Adminsitrasi Data Pajak BBNKB</title>
	<link rel="icon" href="report/gambar/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<style>
		.bg {
			background-image: url('report/gambar/3.jpg');
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			background-color: grey;
		}

		.custom-siderbar-bg {
			background-color: green;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand custom-siderbar-bg navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>APLIKASI PENDATAAN ADMINISTRASI PAJAK BBNKB</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="report/gambar/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> UPPD BANJARMASIN II</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/admin.ico">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Master Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-jenis_pelayanan" class="nav-link">
											<i class="nav-icon fas fa-book text-warning"></i>
											<p>Jenis Pelayanan</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-petugas_bbnkb" class="nav-link">
											<i class="nav-icon fas fa-car text-warning"></i>
											<p>Petugas Pelayanan BBNKB</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pemutihan" class="nav-link">
											<i class="nav-icon fas fa-motorcycle text-warning"></i>
											<p>Pemutihan Pajak</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-bbnkb" class="nav-link">
											<i class="nav-icon fas fa-edit text-warning"></i>
											<p>Pelayanan BBNKB</p>
										</a>
									</li>


									<li class="nav-item">
										<a href="#" class="nav-link">
											<i class="nav-icon fas fa-home text-warning"></i>
											<p>
												Data Pindah
												<i class="fas fa-angle-left right"></i>
											</p>
										</a>
										<ul class="nav nav-treeview">
											<li class="nav-item">
												<a href="?page=data-pindah_i" class="nav-link">
													<i class="nav-icon fas fa-car text-warning"></i>
													<p>Pindah BJM I Ke BJM II</p>
												</a>
											</li>
											<li class="nav-item">
												<a href="?page=data-pindah_ii" class="nav-link">
													<i class="nav-icon fas fa-car text-warning"></i>
													<p>Pindah BJM II Ke BJM I</p>
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a href="?page=data-user" class="nav-link">
											<i class="nav-icon fas fa-user text-warning"></i>
											<p>
												Data User
											</p>
										</a>
									</li>
								</ul>
							</li>


							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Laporan Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="report/jenis_pelayanan/cetak_jenis_pelayanan.php" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Jenis Pelayanan</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="report/petugas_bbnkb/cetak_petugas_bbnkb.php" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Petugas Pelayanan BBNKB</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-pemutihan" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pemutihan Pajak</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-bbnkb" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pelayanan BBNKB</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-pindah_i" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pindah BJM I Ke BJM II</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-pindah_ii" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pindah BJM II Ke BJM I</p>
										</a>
									</li>

								</ul>
							</li>

							<li class="nav-header">Setting</li>


						<?php
						} elseif ($data_level == "KASI Pelayanan PKB & BBNKB") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Laporan Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="report/jenis_pelayanan/cetak_jenis_pelayanan.php" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Jenis Pelayanan</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="report/petugas_bbnkb/cetak_petugas_bbnkb.php" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Petugas Pelayanan BBNKB</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-pemutihan" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pemutihan Pajak</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-bbnkb" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pelayanan BBNKB</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-pindah_i" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pindah BJM I Ke BJM II</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=laporan-pindah_ii" class="nav-link">
											<i class="nav-icon fas fa-print text-warning"></i>
											<p>Data Pindah BJM II Ke BJM I</p>
										</a>
									</li>

								</ul>
							</li>
						<?php
						}
						?>

						<li class="nav-item">
							<a href="?page=profile" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Profile
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {

								//User
							case 'data-user':
								include "admin/user/data_user.php";
								break;
							case 'add-user':
								include "admin/user/add_user.php";
								break;
							case 'edit-user':
								include "admin/user/edit_user.php";
								break;
							case 'del-user':
								include "admin/user/del_user.php";
								break;

								//Pemutihan
							case 'data-pemutihan':
								include "admin/pemutihan/data_pemutihan.php";
								break;
							case 'add-pemutihan':
								include "admin/pemutihan/add_pemutihan.php";
								break;
							case 'edit-pemutihan':
								include "admin/pemutihan/edit_pemutihan.php";
								break;
							case 'del-pemutihan':
								include "admin/pemutihan/del_pemutihan.php";
								break;
							case 'detail-pemutihan':
								include "admin/pemutihan/detail_pemutihan.php";
								break;

								//BBNKB
							case 'data-bbnkb':
								include "admin/bbnkb/data_bbnkb.php";
								break;
							case 'add-bbnkb':
								include "admin/bbnkb/add_bbnkb.php";
								break;
							case 'edit-bbnkb':
								include "admin/bbnkb/edit_bbnkb.php";
								break;
							case 'del-bbnkb':
								include "admin/bbnkb/del_bbnkb.php";
								break;
							case 'detail-bbnkb':
								include "admin/bbnkb/detail_bbnkb.php";
								break;

								//Mutasi Masuk
							case 'data-mutasi':
								include "admin/mutasi/data_mutasi.php";
								break;
							case 'add-mutasi':
								include "admin/mutasi/add_mutasi.php";
								break;
							case 'edit-mutasi':
								include "admin/mutasi/edit_mutasi.php";
								break;
							case 'del-mutasi':
								include "admin/mutasi/del_mutasi.php";
								break;
							case 'detail-mutasi':
								include "admin/mutasi/detail_mutasi.php";
								break;

								//pindah_i
							case 'data-pindah_i':
								include "admin/pindah_i/data_pindah_i.php";
								break;
							case 'add-pindah_i':
								include "admin/pindah_i/add_pindah_i.php";
								break;
							case 'edit-pindah_i':
								include "admin/pindah_i/edit_pindah_i.php";
								break;
							case 'del-pindah_i':
								include "admin/pindah_i/del_pindah_i.php";
								break;
							case 'detail-pindah_i':
								include "admin/pindah_i/detail_pindah_i.php";
								break;

								//pindah_ii
							case 'data-pindah_ii':
								include "admin/pindah_ii/data_pindah_ii.php";
								break;
							case 'add-pindah_ii':
								include "admin/pindah_ii/add_pindah_ii.php";
								break;
							case 'edit-pindah_ii':
								include "admin/pindah_ii/edit_pindah_ii.php";
								break;
							case 'del-pindah_ii':
								include "admin/pindah_ii/del_pindah_ii.php";
								break;
							case 'detail-pindah_ii':
								include "admin/pindah_ii/detail_pindah_ii.php";
								break;

								//petugas_bbnkb
							case 'data-petugas_bbnkb':
								include "admin/petugas_bbnkb/data_petugas_bbnkb.php";
								break;
							case 'add-petugas_bbnkb':
								include "admin/petugas_bbnkb/add_petugas_bbnkb.php";
								break;
							case 'edit-petugas_bbnkb':
								include "admin/petugas_bbnkb/edit_petugas_bbnkb.php";
								break;
							case 'del-petugas_bbnkb':
								include "admin/petugas_bbnkb/del_petugas_bbnkb.php";
								break;
							case 'detail-petugas_bbnkb':
								include "admin/petugas_bbnkb/detail_petugas_bbnkb.php";
								break;

								//jenis_pelayanan
							case 'data-jenis_pelayanan':
								include "admin/jenis_pelayanan/data_jenis_pelayanan.php";
								break;
							case 'add-jenis_pelayanan':
								include "admin/jenis_pelayanan/add_jenis_pelayanan.php";
								break;
							case 'edit-jenis_pelayanan':
								include "admin/jenis_pelayanan/edit_jenis_pelayanan.php";
								break;
							case 'del-jenis_pelayanan':
								include "admin/jenis_pelayanan/del_jenis_pelayanan.php";
								break;
							case 'detail-jenis_pelayanan':
								include "admin/jenis_pelayanan/detail_jenis_pelayanan.php";
								break;

							case 'laporan-pemutihan':
								include 'report/pemutihan/laporan-pemutihan.php';
								break;
							case 'laporan-bbnkb':
								include 'report/bbnkb/laporan-bbnkb.php';
								break;
							case 'laporan-pindah_i':
								include 'report/pindah_i/laporan-pindah_i.php';
								break;
							case 'laporan-pindah_ii':
								include 'report/pindah_ii/laporan-pindah_ii.php';
								break;
								// profile
							case 'profile':
								include 'profile/index.php';
								break;
							case 'profile.edit':
								include 'profile/edit.php';
								break;
							case 'profile.ubah-password':
								include 'profile/ubah-password.php';
								break;
								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "KASI Pelayanan PKB & BBNKB") {
							include "home/kasi_bbnkb.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<b>UPPD BANJARMASIN II</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	<script>
		$(function() {
			$('input#filter').daterangepicker({
				opens: 'center'
			}, function(start, end, label) {
				console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
				$("input[name=start]").val(start.format('YYYY-MM-DD'))
				$("input[name=end]").val(end.format('YYYY-MM-DD'))
			});
		});
	</script>

</body>

</html>