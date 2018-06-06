<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
 			<head>
 				<title>manager</title>
 			</head>
 			<body>
 				<form action="addpay.php" method="post">
					<table align="center">
		<tr>
		<td>name</td><td><input type="text" name="name"></input></td>
		</tr>
		<tr>
		<td>id</td><td><input type="number" name="stockid"></input></td>
		</tr>
		<tr>
		<td>id</td><td><input type="number" name="cost"></input></td>
		</tr>
		<tr>
		<td>id</td><td><input type="number" name="remaining"></input></td>
		</tr>
		<tr>
		<td><button type="submit" name="submit">Submit</button></td>
	</tr>	
	</table>
</form>
 			</body>
 			</html>