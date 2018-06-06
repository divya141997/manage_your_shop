<?php
 		include '../conn.php';
 		session_start();
 		if($_SESSION['login_user']) {
 			$name = $_POST['name'];
 			$id = $_POST['staffid'];
 			if (empty($name) || empty($id))
	{
		$error = "Flield cannot be empty";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstaff.php';</script>";
	}
	else
	{
 			$sql = "INSERT INTO staffid(id,name) values('$id','$name')";
 			if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!!!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='addstaff.php';</script>";
					}
					else{
						$error = "Staff added successfully. User staff can sign up to activate account.";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstaff.php';</script>";
					}
 		}
}
 		else{
 			$error = "Login required.";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='../home/index.html';</script>";
 		}
?>