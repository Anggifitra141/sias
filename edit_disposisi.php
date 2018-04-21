<?php
	if ($_SESSION['level']== 'user') {
		echo '<script>
				window.alert("Anda tidak memiliki hak akses ke halaman ini");
				window.location.href="./logout.php";
			  </script>';
	}


	$id_surat= $_REQUEST['id'];
	$query 	 = "SELECT * FROM surat_masuk WHERE id='$id_surat'";
	$sql 	 = mysqli_query($connect, $query);
	list($id_surat) = mysqli_fetch_array($sql);

	$id_disp = $_REQUEST['id_disp'];
	$query2  = "SELECT * FROM disposisi WHERE id_disp='$id_disp'";
	$sql2    = mysqli_query($connect, $query2);
	$row     = mysqli_fetch_array($sql2);
		if (isset($_REQUEST['edit'])) {
			$tujuan 		= $_POST['tujuan'];
			$isi_disposisi	= $_POST['isi_disposisi'];
			$batas_waktu	= InggrisTgl($_POST['batas_waktu']);
			$sifat 			= $_POST['sifat'];
			$catatan 		= $_POST['catatan'];

			$query3 			= "UPDATE disposisi SET tujuan='$tujuan', isi_disposisi='$isi_disposisi', sifat='$sifat', batas_waktu='$batas_waktu', catatan='$catatan' WHERE id_disp='$id_disp'";
			$sql3 			= mysqli_query($connect, $query3);

			if ($sql3) {
				echo '<script>
						window.alert("Data berhasil di ubah");
						window.location.href="./index.php?page=disposisi&id='.$id_surat.'";
				 	  </script>';
			}else{
				echo '<script>
						window.alert("Data gagal di ubah");
					  </script>';
			}
 		}
?>
	
	<div class="">
		<div class="page_title">
			<div class="title_left">
				<h3>Edit Disposisi Surat</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Edit Disposisi Surat</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!-- Form Edit Disposisi Surat -->
						<?php
							$query 	= "SELECT * FROM disposisi WHERE id_disp='$_GET[id_disp]'";
							$sql  	= mysqli_query($connect, $query);
							while ($data = mysqli_fetch_array($sql)) {
						?>
						<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Tujuan<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="tujuan" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $data['tujuan'] ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Isi Disposisi<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="isi_disposisi" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $data['isi_disposisi'] ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Batas Waktu<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="batas_waktu" class="form-control has-feedback-left" id="tanggal" required="required" value="<?php echo IndonesiaTgl($data['batas_waktu']); ?>">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Sifat<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="sifat" required="required">
										<option><?php echo $data['sifat'] ?></option>
										<option>Biasa</option>
										<option>Penting</option>
										<option>Segera</option>
										<option>Rahasia</option>
									</select>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-xs-12">Catatan<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="catatan" class="form-control col-md-7 col-xs-12" required="required" ><?php echo $data['catatan'] ?></textarea>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="reset" class="btn btn-default">Reset</button>
									<input type="submit" class="btn btn-success" value="Simpan" name="edit">
								</div>		
							</div>
						</form>
						<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>