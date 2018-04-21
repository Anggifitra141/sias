	
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Buku Agenda</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<form>
						<h2>Data Surat Masuk</h2>&nbsp; &nbsp; 
							<a href="export_xls_sm.php" type="submit" name="xls" class="btn btn-success"><i class="fa fa-download"></i> Export All Data To Excel</a>
						</form>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content">
						<form class="form-horizontal form-label-left" method="post" action="lap_agd_surat_masuk.php" target="_blank">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Dari Tanggal<span class="required">&nbsp; :</span></label>
								<div class="col-md-5 col-sm-5 col-xs-12">
									<input type="text" name="dari_tanggal" class="form-control has-feedback-left" id="tanggal">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Sampai Tanggal<span class="required">&nbsp; :</span></label>
								<div class="col-md-5 col-sm-5 col-xs-12">
									<input type="text" name="sampai_tanggal" class="form-control has-feedback-left" id="tanggal2">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
								</div>
							</div>
							<br/>
							<div class="form-group">
								<div class="col-md-6 col-sm-offset-3">
									<button type="submit" name="cetak" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</button>
									<a href="index.php?page=agd_surat_masuk" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
								</div>	
							</div>
						</form>	
					</div>			
				</div>
			</div>
		</div>
	</div>
	