
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Profil</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Profil user</h2>&nbsp;
						<?php 
							$query	= "SELECT * FROM user";
							$sql	= mysqli_query($connect, $query);
							$data   = mysqli_fetch_array($sql);
							if ($_SESSION['level']== 'admin') {
							?>
								<a href="index.php?page=edit_users&id=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> Edit Profil</a>'
						<?php		
							}
						?>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row" align="center">
							<div class="col-md-12 col-sm-10 col-xs-12">
								<div class="pricing">
									<div class="title">
										<center>
											<img src="upload/user/<?php echo $_SESSION['foto'] ?>" alt="" class="img-circle img-responsive" style=" width: 100px; height: 80px;">
										</center>
									</div>	
									<div class="x_content">
										<div class="">
											<div class="pricing_features">
												<ul class="list-unstyled">
													<center>
														<div class="">
															<strong>Fullname</strong><br>
															<p><?php echo $_SESSION['fullname']; ?></p>
															<hr>
														</div>
														<div class="">
															<strong>Username</strong>
															<p><?php echo $_SESSION['username']; ?></p>
															<hr>
														</div>	
														<div class="">
															<strong>Level</strong>
															<p><?php echo $_SESSION['level'] ?></p>
															<hr>
														</div>
														<div class="">
															<strong>Jenis Kelamin</strong>
															<p><?php echo $_SESSION['jenis_kelamin'] ?></p>
														</div>
													</center>	
												</ul>
											</div>		
										</div>
									</div>

								</div>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>