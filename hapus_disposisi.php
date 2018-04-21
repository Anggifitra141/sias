<?php
	include 'koneksi.php';
	$id_disp	= $_REQUEST['id_disp']; 
	$query 		= "SELECT * FROM disposisi WHERE id_disp='$id_disp'";
	$sql   		= mysqli_query($connect, $query);

	$row  		= mysqli_fetch_array($sql);

	$id_disp 	= $_REQUEST['id_disp'];
	$query2   	= "DELETE FROM disposisi WHERE id_disp='$id_disp'";
	$sql2 		= mysqli_query($connect, $query2);
	if ($sql2) {
		echo '<script> 
				window.alert("Data berhasil di hapus");
				window.location.href="./index.php?page=disposisi&id='.$row['id_surat'].'";
			 </script>';
	}else{
		echo '<script>
				window.alert("Data gagal di hapus");
			 </script>';
	}
?>