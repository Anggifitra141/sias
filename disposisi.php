<?php
	if ($_SESSION['level']== 'user') {
		echo '<script> 
				window.alert("Anda tidak memiliki hak akses ke halaman ini");
				window.location.href="./logout.php";
			  </script>';
	}

	$id_surat = $_REQUEST['id'];
	$query	= "SELECT * FROM surat_masuk WHERE id='$id_surat'";
	$sql	= mysqli_query($connect, $query);
	$data	= mysqli_fetch_array($sql);
					
?>

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Disposisi</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Disposisi Surat</h2>&nbsp; &nbsp; 
						<a href="index.php?page=tambah_disposisi&id=<?php echo $data['id']?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Disposisi</a>
						<a href="index.php?page=surat_masuk" class="btn btn-warning btn-sm"><i class="fa fa-reply"></i> Kembali</a>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
						<div class="bs-example-popovers">
							<div class="alert alert-success alert-dismissible fade-in" role="alert">
								<h2><strong>Perihal Surat :</strong></h2><br>
								
								<p><?php echo $data['isi_ringkas']; ?></p>
							</div>
						</div>
					<div class="x_content">
						<table id="disposisi" class="table table-striped table-bordered table-hover">
							<thead>
								<tr style="font-size: 13px;">
									<th width="1" style="vertical-align: middle;">No</th>
									<th style="vertical-align: middle;"><center>Tujuan</center></th>
									<th style="vertical-align: middle;"><center>Isi Disposisi</center></th>
									<th style="vertical-align: middle;"><center>Sifat, <br> Batas Waktu</center></th>
									<th style="vertical-align: middle;"><center>Action</center></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
										$no=1;
										$query2	= "SELECT * FROM disposisi JOIN surat_masuk ON disposisi.id_surat = surat_masuk.id WHERE disposisi.id_surat='$id_surat'";
										$sql2	= mysqli_query($connect, $query2);
										while ($row= mysqli_fetch_array($sql2)) {
									?>
									<td width="1" style="vertical-align: middle;"><?php echo $no++; ?></td>
									<td style="vertical-align: middle;"><?php echo $row['tujuan']; ?></td>
									<td style="vertical-align: middle;"><?php echo $row['isi_disposisi']; ?></td>
									<td style="vertical-align: middle;"><?php echo $row['sifat']?>, <br><?php echo IndonesiaTgl($row['batas_waktu']);?></td>
									<td>
										<center>
											<a href="index.php?page=edit_disposisi&id=<?php echo $id_surat ?>&id_disp=<?php echo $row['id_disp'] ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
											<a href="index.php?page=hapus_disposisi&id=<?php echo $id_surat ?>&id_disp=<?php echo $row['id_disp'] ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
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