<?php
include '../conn.php';//look up the record based on email and get the firstname and lastname
$stoname=$_POST['$stname'];
$stotype=$_POST['$sttype'];

  $result = mysql_query("SELECT * FROM stock 
     WHERE name == $stname AND type == $stotype"); 
     $myrow = mysql_fetch_array($result) ;    //DB table name=json1
if (mysql_num_rows($result) == 1) 
        {
//build the JSON array for return

?>
<<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	body{
		background-color: blue;
	}

	</style>
</head>
<body>


<div style="background-color: white;">
<form>
<table align="center">
                    <tr>eerf
                    <td>stock name</td><td><input type="text" name="stname" value="<?php echo '$myrow[name]';?>" ></input></td>
                    </tr>
                    <tr>
                    <td>type</td><td><input type="text" name="type" value="<?php echo '$myrow[type]';?>" ></input></td>
                    </tr>
                    <tr>
                    <td>price per kilo</td><td><input type="number" name="price" value="<?php echo '$myrow[price]';?>" ></input></td>
                    </tr>
                    <tr>
                    <td>Quantity in kilos</td><td><input type="number" name="quantity" value="<?php echo '$myrow[quantity]';?>" ></input></td>
                    </tr>
                    <tr>
                    <td>expiry date</td><td><input type="date" name="expiry" value="<?php echo '$myrow[expiry]';?>" ></input></td>
                    </tr>
                  </table>
                  </form>

                  <?php }else{
                  	$error = "Stock added successfully.";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; </script>";
							header('Location: ' . $_SERVER['HTTP_REFERER']);
                  }?>

                  </body>
</html>