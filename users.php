	<?php
		if ($_SESSION['level']== 'user') {
			echo '<script> 
					window.alert("Anda tidak memiliki akses ke halaman ini");
					window.location.href="./logout.php";
				  </script>';		
		}
	?>
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Users</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data users</h2>&nbsp; &nbsp;<a href="index.php?page=tambah_users" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah users</a>
						<ul class="nav navbar-rigth panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class=""></div>
					</div>
					<div class="x_content">
						<table id="user" class="table table-striped table-bordered table-hover">
							<thead>
								<tr style="font-size: 13px;">
									<th width="1" style="vertical-align: middle;">No</th>
									<th style="vertical-align: middle;"><center>Foto</center></th>
									<th style="vertical-align: middle;"><center>Username</center></th>
									<th style="vertical-align: middle;"><center>Fullname</center></th>
									<th style="vertical-align: middle;"><center>Level</center></th>
									<th style="vertical-align: middle;"><center>Jenis kelamin</center></th>
									<th><center>Action</center></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php 
										$no=1;
										$query	= "SELECT * FROM user";
										$sql	= mysqli_query($connect, $query);
										while ($data= mysqli_fetch_array($sql)) {
									?>
									<td width="1" style="vertical-align: middle;"><?php echo $no++; ?></td>
									<td style="vertical-align: middle;"><img src="upload/user/<?php echo $data['foto']?>" width="50" height="50"></td>
									<td style="vertical-align: middle;"><?php echo $data['username']; ?></td>
									<td style="vertical-align: middle;"><?php echo $data['fullname']; ?></td>
									<td style="vertical-align: middle;"><?php echo $data['level'] ?></td>
									<td style="vertical-align: middle;"><?php echo $data['jenis_kelamin']; ?></td>
									<td>
										<center>
											<a href="index.php?page=edit_users&id=<?php echo $data['id'] ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
											<a href="index.php?page=hapus_users&id=<?php echo $data['id'] ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
										</center>
									</td>
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>