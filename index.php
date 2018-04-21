<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<title> SIAS </title>

		<!-- Bootstrap -->
		<link href="assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="assets/template/vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- bootstrap-daterangepicker -->
		<link href="assets/template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="assets/template/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet">
		<!-- Data tables -->
		<link href="assets/template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<!-- Custom Theme Style -->
		<link href="assets/template/build/css/custom.min.css" rel="stylesheet">
	</head>
	<?php
			include 'koneksi.php';
			include 'function_tanggal.php';
			session_start();
			//cek session
			if(!isset($_SESSION['username'])){
				echo '<script>
							window.alert("Anda belum login, Silahkan login kembali");
							window.location.href="./login.php";
					  </script>';
			}else
				if(!isset($_SESSION['username'])){
				echo '<script>
							window.alert("Anda belum login, Silahkan login kembali");
							window.location.href="./login.php";
					  </script>';
			}
			//set time session
			$time= 60;
			$ise="internal_server_error.php";
			$timeout= $time * 10;
			if (isset($_SESSION['start_time'])) {
				$ellapsed_time = time() - $_SESSION['start_time'];
				if ($ellapsed_time >= $timeout) {
					session_destroy();
					echo "<script> window.location = '$ise'</script>";
				}
			}
			$_SESSION['start_time'] = time();
	 ?>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="index.php" class="site_title"><i class="fa fa-home"></i> SIAS</a>
						</div>

						<div class="clearfix"></div>

						<!-- menu profile quick info -->
						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="upload/user/<?php echo $_SESSION['foto']; ?>" alt="..." class="img-circle profile_img">
							</div>
							<div class="profile_info">
								<span>Welcome,</span>
								<h2><?php echo $_SESSION['fullname']; ?></h2>
							</div>
						</div>
						<!-- /menu profile quick info -->

						<br />

						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<h3>General</h3>
								<ul class="nav side-menu">
									<li><a href="index.php?page=home"><i class="fa fa-dashboard"></i> Dashboard </a>
									<li><a><i class="fa fa-edit"></i> Transaksi Surat<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="index.php?page=surat_masuk">Surat Masuk</a></li>
											<li><a href="index.php?page=surat_keluar">Surat Keluar</a></li>
										</ul>
									</li>
									<li><a><i class="fa fa-print"></i> Buku Agenda <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="index.php?page=agd_surat_masuk">Surat Masuk</a></li>
											<li><a href="index.php?page=agd_surat_keluar">Surat keluar</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="menu_section">
							<?php
							if($_SESSION['level'] == 'admin'){
							?>
								<h3>Setting</h3>
								<ul class="nav side-menu">
									<li><a href="index.php?page=users"><i class="fa fa-user"></i> Users </a></li>
									<li><a><i class="fa fa-files-o"></i> Data <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="index.php?page=backup">Backup</a></li>
											<li><a href="index.php?page=restore">Restore</a></li>
										</ul>
									</li>
								</ul>
							 <?php
							 }
							 ?> 
							</div>
							<div class="menu_section">
								<h3>Application</h3>
								<ul class="nav side-menu">
								<li><a href="index.php?page=tentang"><i class="fa fa-info"></i> Tentang </a></li>
							</div>
						</div>
						<!-- /sidebar menu -->

						<!-- /menu footer buttons -->
						<div class="sidebar-footer hidden-small">
							<a data-toggle="tooltip" data-placement="top" title="" href="logout.php" data-original-title="Logout">
								<span class="glyphicon glyphicon-off"></span>
							</a>
						</div>
						<!-- /menu footer buttons -->
					</div>
				</div>

				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<nav>
							<div class="nav toggle">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>

							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<img src="upload/user/<?php echo $_SESSION['foto'] ?>" alt=""><?php echo $_SESSION['fullname']; ?>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li><a href="index.php?page=profil_user"> Profile</a></li>
										<li><a href="index.php?page=ganti_pass"> Ganti Password</a></li>
										<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->
				
				<!-- page content -->
				<div class="right_col" role="main">
				<?php
				// GET PAGE
					if (isset($_GET['page'])) {
						if ($_GET['page']=="home") {
							include 'home.php';
						//surat_masuk
						}elseif ($_GET['page']=="surat_masuk") {
							include 'surat_masuk.php';  
						}elseif ($_GET['page']=="tambah_surat_masuk") {
							include 'tambah_surat_masuk.php';
						}elseif ($_GET['page']=="edit_surat_masuk") {
							include 'edit_surat_masuk.php';
						}elseif ($_GET['page']=="hapus_surat_masuk") {
							include 'hapus_surat_masuk.php';
					/*  }elseif ($_GET['page']=="cetak_disposisi") {
							include 'cetak_disposisi.php';
					*/

						//disposisi	 
						}elseif ($_GET['page']=="disposisi") {
							include 'disposisi.php';
						}elseif ($_GET['page']=="tambah_disposisi") {
							include 'tambah_disposisi.php'; 
						}elseif ($_GET['page']=="edit_disposisi") {
							include 'edit_disposisi.php'; 	
						}elseif ($_GET['page']=="hapus_disposisi") {
							include 'hapus_disposisi.php'; 		 	 
						//surat_keluar 
						}elseif ($_GET['page']=="surat_keluar") {
							include 'surat_keluar.php';
						}elseif ($_GET['page']=="tambah_surat_keluar") {
							include 'tambah_surat_keluar.php';
						}elseif ($_GET['page']=="edit_surat_keluar") {
							include 'edit_surat_keluar.php';
						}elseif ($_GET['page']=="hapus_surat_keluar") {
							include 'hapus_surat_keluar.php';
						//Buku agenda
						}elseif ($_GET['page']=="agd_surat_masuk") {
							include 'agd_surat_masuk.php';
						}elseif ($_GET['page']=="agd_surat_keluar") {
							include 'agd_surat_keluar.php';
						//settings  
						}elseif ($_GET['page']=="users") {
							include 'users.php';
						}elseif ($_GET['page']=="tambah_users") {
							include 'tambah_users.php';
						}elseif ($_GET['page']=="edit_users") {
							include 'edit_users.php';
						}elseif ($_GET['page']=="hapus_users") {
							include 'hapus_users.php';
						}elseif ($_GET['page']=="backup") {
							include 'backup.php';
						}elseif ($_GET['page']=="restore") {
							include 'restore.php';
						}elseif ($_GET['page']=="ganti_pass") {
							include 'ganti_pass.php';
						//general 
						}elseif ($_GET['page']=="tentang") {
							include 'tentang.php';
						}elseif ($_GET['page']=="profil_pembuat") {
							include 'profil_pembuat.php';
						}elseif ($_GET['page']=="profil_user") {
							include 'profil_user.php';
						}
					}else {
						include 'home.php';
					}
				?>

			</div>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
					<strong>© 2018-2019 SIAS.</strong> All right reserved
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="assets/template/vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="assets/template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="assets/template/vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="assets/template/vendors/nprogress/nprogress.js"></script>
		<!-- Chart.js -->
		<script src="assets/template/vendors/Chart.js/dist/Chart.min.js"></script>
		<!-- jQuery Sparklines -->
		<script src="assets/template/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- Data tables -->
		<script src="assets/template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="assets/template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- morris.js -->
		<script src="assets/template/vendors/raphael/raphael.min.js"></script>
		<script src="assets/template/vendors/morris.js/morris.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="assets/template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- Flot -->
		<script src="assets/template/vendors/Flot/jquery.flot.js"></script>
		<script src="assets/template/vendors/Flot/jquery.flot.pie.js"></script>
		<script src="assets/template/vendors/Flot/jquery.flot.time.js"></script>
		<script src="assets/template/vendors/Flot/jquery.flot.stack.js"></script>
		<script src="assets/template/vendors/Flot/jquery.flot.resize.js"></script>
		<!-- Flot plugins -->
		<script src="assets/template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
		<script src="assets/template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
		<script src="assets/template/vendors/flot.curvedlines/curvedLines.js"></script>
		<!-- DateJS -->
		<script src="assets/template/vendors/DateJS/build/date.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="assets/template/vendors/moment/min/moment.min.js"></script>
		<script src="assets/template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="assets/template/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="assets/template/build/js/custom.min.js"></script>
		<script>
			$(function(){
				$('#surat_masuk').DataTable()
				$('#surat_keluar').DataTable()
				$('#user').DataTable()
				$('#disposisi').DataTable()
				$('#agd_surat_masuk').DataTable()
				$('#').DataTable({
					'paging'      : true,
					'lengthChange': true,
					'searching'   : true,
					'ordering'    : true,
					'info'        : true,
					'autoWidth'   : false, 
				});
			});
			//datepicker
			$(document).ready(function () {
			$('#tanggal').datepicker({
				format: "dd-mm-yyyy",
				todayHighlight: true,
				});
			$('#tanggal2').datepicker({
				format: "dd-mm-yyyy",
				todayHighlight: true,
				});
			});
		</script>

		<script>
  $(function () {
    "use strict";
    <?php
    	//
          $count1a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='1'"));
          $count2a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='2'"));
          $count3a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='3'"));
          $count4a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='4'"));
          $count5a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='5'"));
          $count6a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='6'"));
          $count7a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='7'"));
          $count8a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='8'"));
          $count9a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='9'"));
          $count10a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='10'"));
          $count11a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='11'"));
          $count12a = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_surat AS total FROM surat_masuk WHERE MONTH(tanggal_surat)='12'"));

          //menghitung jumlah surat masuk
          $count1b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='1'"));
          $count2b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='2'"));
          $count3b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='3'"));
          $count4b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='4'"));
          $count5b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='5'"));
          $count6b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='6'"));
          $count7b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='7'"));
          $count8b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='8'"));
          $count9b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='9'"));
          $count10b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='10'"));
          $count11b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='11'"));
          $count12b = mysqli_num_rows(mysqli_query($connect, "SELECT tanggal_kirim AS total FROM surat_keluar WHERE MONTH(tanggal_kirim)='12'"));
    ?>
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'chart',
      resize: true,
      data: [
        {y: 'Jan', a: '<?php echo $count1a ?>', b: '<?php echo $count1b ?>'},
        {y: 'Feb', a: '<?php echo $count2a ?>', b: '<?php echo $count2b ?>'},
        {y: 'Maret', a: '<?php echo $count3a ?>', b: '<?php echo $count3b ?>'},
        {y: 'April', a: '<?php echo $count4a ?>', b: '<?php echo $count4b ?>'},
        {y: 'Mei', a: '<?php echo $count5a ?>', b: '<?php echo $count5b ?>'},
        {y: 'Juni', a: '<?php echo $count6a ?>', b: '<?php echo $count6b ?>'},
        {y: 'Juli', a: '<?php echo $count7a ?>', b: '<?php echo $count7b ?>'},
        {y: 'Agt', a: '<?php echo $count8a ?>', b: '<?php echo $count8b ?>'},
        {y: 'Sep', a: '<?php echo $count9a ?>', b: '<?php echo $count9b ?>'},
        {y: 'Okt', a: '<?php echo $count10a ?>', b: '<?php echo $count10b ?>'},
        {y: 'Nov', a: '<?php echo $count11a ?>', b: '<?php echo $count11b ?>'},
        {y: 'Des', a: '<?php echo $count12a ?>', b: '<?php echo $count12b ?>'}
      ],
      barColors: ['#26B99A', '#3498DB'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['surat masuk', 'surat keluar'],
      hideHover: 'auto'
    });
  });
</script>
	
	</body>
</html>
