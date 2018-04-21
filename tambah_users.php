	<?php
		if ($_SESSION['level']== 'user') {
			echo '<script> 
					window.alert("Anda tidak memiliki hak akses ke halaman ini");
					window.location.href="./logout.php";
				 </script>';
		}
		if (isset($_REQUEST['tambah'])) {
			$username 		= $_POST['username'];
			$password 		= md5($_POST['password']);
			$fullname 		= $_POST['fullname'];
			$level 			= $_POST['level'];
			$jenis_kelamin 	= $_POST['jenis_kelamin'];
			$foto 			= $_FILES['foto']['name'];
			$tmp 			= $_FILES['foto']['tmp_name'];

			$path			= "upload/user/".$foto;
			if (move_uploaded_file($tmp, $path)) {
				$query 		= "INSERT INTO user VALUES('', '$username', '$password', '$fullname', '$level', '$jenis_kelamin', '$foto')";
				$sql 		= mysqli_query($connect, $query);

			if ($sql) {
				echo '<script>
						window.alert("Data berhasil di simpan");
						window.location.href="./index.php?page=users";
					  </script>';
			}else{
				echo '<script>
						window.alert("Data gagal di simpan");
					  </script>';
				}
			}
		}
	?>

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tambah users</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Tambah User</h2>
						<ul class="nav navbar-rigth panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!-- Form tambah user -->
						<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="username" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Fullname<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="fullname" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Level<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="level" required="required">
								        <option>admin</option>
								        <option>user</option>
							        </select>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="jenis_kelamin" required="required">
								        <option>Laki Laki</option>
								        <option>Perempuan</option>
							        </select>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="password" name="password" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="foto" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="reset" class="btn btn-default">Reset</button>
									<input type="submit" class="btn btn-success" name="tambah" value="Simpan">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>