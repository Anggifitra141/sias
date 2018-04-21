	<?php
		if (isset($_REQUEST['submit'])) {
			$no_agenda 		= $_POST['no_agenda'];
			$no_surat		= $_POST['no_surat'];
			$jenis_surat 	= $_POST['jenis_surat'];
			$tanggal_surat	= InggrisTgl($_POST['tanggal_surat']);	
			$asal_surat		= $_POST['asal_surat'];
			$isi_ringkas	= $_POST['isi_ringkas'];
			$user   		= $_SESSION['fullname'];
			$file     		= $_FILES['file']['name'];
			$tmp 			= $_FILES['file']['tmp_name'];

			$path			= "upload/surat_masuk/".$file;
			if (move_uploaded_file($tmp, $path)) {
				$query 		= "INSERT INTO surat_masuk VALUES('', '$no_agenda', '$no_surat', '$jenis_surat', '$tanggal_surat',NOW(), '$asal_surat', '$isi_ringkas', '$file', '$user')";
				$sql		= mysqli_query($connect, $query);
			if($sql){
			    echo  '<script language="javascript">
               		  	window.location.href="./index.php?page=surat_masuk";
              		  </script>';  
			}else{
				echo  '<script>
						window.alert("Data gagal di simpan");
					  </script>';
			}
			}		
		}
	?>	

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tambah surat masuk</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Tambah Surat Masuk</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!--Form tambah surat masuk -->
						<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">No Agenda<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="no_agenda" class="form-control col-md-7 col-xs-12"  required="required">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">No Surat<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="no_surat" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>	
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Surat<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="jenis_surat" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"  name="tanggal_surat" class="form-control has-feedback-left" id="tanggal">
                               		<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>	
								</div>
							</div>								
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Surat<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="asal_surat" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>	
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Isi ringkas<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="isi_ringkas" class="form-control col-md-7 col-xs-12" required="required"></textarea>
								</div>
							</div>													
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">File<span class="required">&nbsp; :</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="file" class="form-control col-md-7 col-xs-12" required="required">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="reset" class="btn btn-default">Reset</button>
  									<input type="submit" class="btn btn-success" value="Simpan" name="submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>