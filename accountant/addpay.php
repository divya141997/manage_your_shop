<?php
 		include 'conn.php';
 		session_start();
 		if($_SESSION['login_user']) {
 			$name = $_POST['name'];
 			$id = $_POST['stockid'];
 			$cost = $_POST['cost'];
 			$remaining = $_POST['remaining'];
 			if (empty($name) || empty($id))
	{
		$error = "Flield cannot be empty";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='addstaff.php';</script>";
	}
	else
	{
 			$sql = "INSERT INTO payment(stockid,name,cost,remaining) values('$id','$name','$cost','$remaining')";
 			if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!!!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='addstaff.php';</script>";
					}
					else{
						$error = "Staff added successfully.";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstaff.php';</script>";
					}
 		}
}
 		else{
 			$error = "Login required.";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='index.php';</script>";
 		}
?>