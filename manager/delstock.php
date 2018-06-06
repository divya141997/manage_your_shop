<?php
	include '../conn.php';
 	$name = $_POST['name'];
 	$type = $_POST['type'];
 	if ($name || $type) {
 		$sql = mysqli_query($con,"SELECT * from stock where name = '$name' AND type = '$type'");

 		if (mysqli_num_rows($sql) > 0)
 		{

 		$sql1 = mysqli_query($con,"DELETE from stock where name = '$name' AND type= '$type'");
 		$error = "Staff is successfully deleted.";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstock.php';</script>";
 	}else{$error = "Specified staff is not found";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstock.php';</script>";
 	}
 	}else{$error = "enter data";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstock.php';</script>";}
 	
 	?>