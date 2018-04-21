	
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Restore</h3>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Restore Data</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-10 col-lg-10 col-sm-10">
							<blockquote>
							
							<strong>Note :</strong>
						
							<h4>
								Mohon maaf untuk fitur restore database anda akan di alihkan ke localhost phpmyadmin.<br>
								Silahkan pilih <strong>Import -> Choose file -> Go</strong>
							</h4><br>
							<center>
								<a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=sias&token=ec9acb23ddff04f9dc054f95d34b8ff3" class="btn btn-success" target="_blank"><i class="fa fa-upload"></i> Restore</a>
							</center>
							
							<footer>File harus ber ekstensi .sql</footer>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		

 
<?php 
$message = '';
if(isset($_POST["restore"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "sias");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
   echo  '<h5>There is an error in Database Import</h5>';
   }
   else
   {
    echo '<h5>Database Successfull Restored!</h5>'; 
   }
  }
  else
  {
   echo '<h5>Invalid File</h5>';
  }
 }
 else
 {
  echo '<h5>Please Select Sql File</h5>';
 }
}
?>
</div>
</div>