<?php include 'conn.php';
include'user.php';
	//session_start();
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$sql = mysqli_query($con,"select id from user where password = '$password' AND username= '$username'");
	$rows =mysqli_num_rows($sql);

	if ($rows == 1) {
		$_SESSION['login_user']=$username;
		//include'user.php';
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
	}
	else{
		$error = "user not found.";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='home/index.html';</script>";
	}
?>