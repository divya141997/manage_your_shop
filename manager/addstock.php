<?php
 		include '../conn.php';
 		session_start();
 		if($_SESSION['login_user']) {
 			$name = $_POST['name'];
 			$type = $_POST['type'];
 			$price = $_POST['price'];
 			$quantity = $_POST['quantity'];
 			$expiry = $_POST['expiry'];
 			if (empty($name) || empty($type) ||empty($price)||empty($quantity)||empty($expiry))
	{
		$error = "Flield cannot be empty";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstock.php';</script>";
	}
	else
	{
 			$sql = "INSERT INTO stock(name,type,price,quantity,expiry ) values('$name','$type','$price','$quantity','$expiry')";
 			if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!!!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='addstock1.php';</script>";
					}
					else{
						$error = "Stock added successfully.";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerstock.php';</script>";
					}
 		}
}
 		else{
 			$error = "Login required.";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='../home/index.html';</script>";
 		}
?>