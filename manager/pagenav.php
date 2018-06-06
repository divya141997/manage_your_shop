<?php
 	
 		$username = $_SESSION['login_user'];
		$sql = mysqli_query($con,"select id from user where username = '$username'");
		$rows =mysqli_num_rows($sql);
		if ($rows > 0) {
			while($row = mysqli_fetch_assoc($sql)){
				$row1 = $row["id"];
				$sql1 = mysqli_query($con,"select * from staff where id = '$row1'");
						
				if(mysqli_num_rows($sql1) > 0){	

					while($roww = mysqli_fetch_assoc($sql1)){
						$id = $roww["id"];
						$name = $roww["name"];
						$role = $roww["role"];
						$email = $roww["email"];
						$gender = $roww["gender"];
						$dob = $roww["dob"];
						$telephone = $roww["telephone"];
						$address = $roww["address"];
					}
				}
			}
		}

		 	
 ?>