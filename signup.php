<?php include 'conn.php'; 
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$dob = $_POST["dob"];
		$address = $_POST["address"];
		$telephone = $_POST["telephone"];
		$gender = $_POST["selectg"];
		$role = $_POST["select"];
		$staffid = $_POST["staffid"];
		$username = $_POST["username"];
		$pass = $_POST["pass"];

		$sql = mysqli_query($con,"select id from user where password = '$pass' AND username= '$username'");
		$rows =mysqli_num_rows($sql);

		if (empty($name)||empty($email) ||empty($dob) || empty($address) || empty($telephone) || empty($username) || empty($pass) || empty($role) || empty($gender) )
		{
			$error = " Any flield cannot be empty";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='signup.html';</script>";
		}
		if($rows > 0) 
		{
			$error = "User already exist. or username and password pair alredy exist.";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='signup.html';</script>";
		}
		else
		{
			if ($role == 'staffm' || $role == 'staffd') 
			{
				$result = mysqli_query($con,"select name from staffid where id = '$staffid'");
				$sql = mysqli_query($con,"DELETE from staffid where id = '$staffid'");
				if (mysqli_num_rows($result) > 0)
				{
					$sql = "INSERT INTO user(username,password)
					VALUES('$username','$pass')";
				
					if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!!!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='signup.html';</script>";
					}
					$sql = mysqli_query($con,"select id from user where username = '$username'");
					if (mysqli_num_rows($sql) > 0){	
					while($row = mysqli_fetch_assoc($sql)){
						$row1 = $row["id"];
					}}
					
					$sql = "INSERT INTO staff(id,name,gender,role,email,dob,address,telephone)
					VALUES('$row1','$name','$gender','$role','$email','$dob','$address','$telephone')";
				
					if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='signup.html';</script>";
					}
				}
				else
				{
					echo "<script type=\"text/javascript\">window.alert('staff is not approved') ; window.location.href='signup.html';</script>";
				}
			}
			else
			{
				$sql = "INSERT INTO user(username,password)
				VALUES('$username','$pass')";
				
				if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='signup.html';</script>";
					}

				$sql = mysqli_query($con,"select id from user where username = '$username'");
					if (mysqli_num_rows($sql) > 0){	
					while($row = mysqli_fetch_assoc($sql)){
						$row1 = $row["id"];
					}}
					

				$sql = "INSERT INTO staff(id,name,gender,role,email,dob,address,telephone)
					VALUES('$row1','$name','$gender','$role','$email','$dob','$address','$telephone')";
				
				if( !mysqli_query($con,$sql))
					{
							$error = "Query is not executed!!";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='signup.html';</script>";
					}
				
			}
			header("location:home/index.html");
		}
	}
?>