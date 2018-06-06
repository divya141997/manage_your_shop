<?php
include 'conn.php';
session_start();
if (isset($_SESSION['login_user'])){
	$username = $_SESSION['login_user'];
	$sql = mysqli_query($con,"select id from user where username = '$username'");
	$rows =mysqli_num_rows($sql);
	if ($rows > 0) {
		while($row = mysqli_fetch_assoc($sql)){
						$row1 = $row["id"];
						$sql1 = mysqli_query($con,"select role from staff where id = '$row1'");
						
						if(mysqli_num_rows($sql1) > 0){	

					while($roww = mysqli_fetch_assoc($sql1)){
						$row12 = $roww["role"];
						if ($row12 = "manager") {
							header("location:manager/mandash.php");
						}
						elseif ($row12 = "accountant") {
							header("location:accountant/accdash.php");
						}
						elseif ($row12 = "staffm") {
							header("location:staffm/staffmdash.php");
						}
						elseif ($row12 = "staffd") {
							header("location:staffd/staffddash.php");
						}
					}}
					}
	}}
	/*else{
		header("location:home/index.html");
	}}*/
 	?>