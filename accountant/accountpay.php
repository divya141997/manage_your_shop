
<html>
<head>
	<title>Manage payment</title>
	<style type="text/css">
		th,td{
			border-width: 1px;
			border-color: GREY;
			border-style: solid;
		}
	</style>
</head>
<body>
	<?php
 		include 'conn.php';
 		session_start();
 		if($_SESSION['login_user']) {
 			$sql = mysqli_query($con,"select * from payment");
 	?>
	  		<button><a href="logout.php">Logout</a></button>
	  		<ul>
	  			<li>Salaries</li>
	  			
	  			<li><a href="managerstaff.php">Payment</a></li>
	  		</ul>
	  		<table align="center" style="border-width: 2px; border-style: solid;">
	  			<tr>
			  		<th>ID</th>
			  		<th>NAME</th>
			  		<th>COST</th>
			  		<th>REMAINING</th>

			  	</tr>
	  			<?php
	  					while ($row = mysqli_fetch_assoc($sql)) {
	  					echo "<tr>";				
	  					echo "<td>";	 
	  					echo $row["id"]; 
	  					echo "</td>";
	  					echo "<td>";	 
	  					echo $row["name"]; 
	  					echo "</td>";
	  					echo "<td>";	 
	  					echo $row["cost"]; 
	  					echo "</td>";
	  					echo "<td>";	 
	  					echo $row["remaining"]; 
 
	  					echo "</td>";
	  					echo "</tr>";
	  				}
	  			?>

	  		</table> 
	  		<button><a href="addpay1.php">ADD</a></button>
	  		<button><a href="delpay1.php">DELETE</a></button>
  	<?php
		}else{
 			$error = "Login required.";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='index.php';</script>";
 		}?>
</body>
</html>