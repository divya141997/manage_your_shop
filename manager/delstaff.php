<?php
	include '../conn.php';
 	$username = $_POST['username'];
 	$id = $_POST['id'];
 	if ($username || $id) {
 		$sql = mysqli_query($con,"SELECT * from staff where name = '$username' AND id = '$id'");

 		if (mysqli_num_rows($sql) > 0)
 		{

 		$sql1 = mysqli_query($con,"DELETE from staff where name = '$username' AND id = '$id'");
 		$sql2 = mysqli_query($con,"DELETE from user where id = '$id'");
 		$error = "Staff is successfully deleted.";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstaff.php';</script>";
 	}else{$error = "Specified staff is not found";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstaff.php';</script>";
 	}
 	}else{$error = "enter data";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstaff.php';</script>";}
 	
 	?>