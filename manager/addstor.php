<?php
include '../conn.php';
 			$name = $_POST['name'];
 			$type = $_POST['type'];
 			$price = $_POST['price'];
 			$quantity = $_POST['quantity'];
 			$expiry = $_POST['expiry'];
 			$ctname = $_POST['ctname'];
 			$ctadd = $_POST['ctadd'];
 			$ctcontact = $_POST['ctcontact'];
 			$stor = $_POST['stor'];
 			$date= date("Y-m-d");
 			$ttprice = ($price * $quantity);
 			if (empty($name) || empty($type) ||empty($price)||empty($quantity)||empty($expiry) ||empty($ctname) ||empty($ctadd) ||empty($ctcontact) ||empty($stor))
	{
		$error = "Flield cannot be empty";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerorder.php';</script>";
	}
	else
	{
			$sql1 = mysqli_query($con,"SELECT id from stock where name = $name AND type = $type And price = $price AND quantity = $quantity AND expiry  = $expiry "); 
			$myrow = mysqli_fetch_assoc($result) ;

			$sql2 = mysqli_query($con,"SELECT id from customer where name = $ctname AND address = $ctadd And contact = $ctcontact ");
			$myrow1 = mysqli_fetch_assoc($result) ;
			if(mysqli_num_rows($sql) <= 0)
 			{
 				$sql3 = mysqli_query($con,"INSERT INTO customer(name,address,contact) values('$ctname','$ctadd','$ctcontact')");
 			}
 			$sql4  = mysqli_query($con,"INSERT INTO orders(type,date,ctid,stid,ttprice) values('$stor','$date','$myrow1','$myrow','$ttprice')");
 			if( !mysqli_query($con,$sql1))
					{
							$error = "Query is not executed!!!!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerorder.php';</script>";
					}
					else{
						$error = "Stock added successfully.";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerorder.php';</script>";
					}

}
 	