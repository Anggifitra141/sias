<?php
	include 'koneksi.php';

	function antiInjection($str) {
    $r = stripslashes(strip_tags(htmlspecialchars($str, ENT_QUOTES)));
    return $r;
  }
		session_start();
		$username = antiInjection($_POST['username']);
		$password = md5($_POST['password']);

		$query    = "SELECT * FROM user WHERE username='$username' and password='$password'";
		$sql = mysqli_query($connect, $query);
		$row    = mysqli_fetch_array($sql);
		if(mysqli_num_rows($sql) >0)
		{
			$_SESSION['id']       		=$row['id'];
			$_SESSION['username']		=$username;
			$_SESSION['fullname'] 		=$row['fullname'];
			$_SESSION['level']    		=$row['level'];
			$_SESSION['jenis_kelamin']  =$row['jenis_kelamin'];   
			$_SESSION['foto']     		=$row['foto'];
			header('location:index.php');
		}else{
			header("location:login.php?pesan=gagal")or die(mysql_error());
		}
?>
