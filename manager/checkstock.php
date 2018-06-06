<?php
include '../conn.php';//look up the record based on email and get the firstname and lastname
$stname=$_POST['stname'];
$sttype=$_POST['sttype'];
$storr = $_POST["stor"];
  $result = mysqli_query($con,"SELECT * FROM stock 
     WHERE name = '$stname' AND type = '$sttype'"); 
     $myrow = mysqli_fetch_assoc($result) ;    //DB table name=json1
if (mysqli_num_rows($result) > 0) 
        {
//build the JSON array for return
        	$error = "Found your stock.";
							echo "<script type=\"text/javascript\">window.alert('.$error.') ; </script>";

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	#success_message{ display: none;};
	body{
		background-color: rgb(102, 140, 255);
		font-family: serif;
	}
	table{
		
		width: 800px;
		
	}
	tr,td{
		text-align: right;
		width: 500px;
		
		font-family: serif;
		font-size: 25px;
		padding: 0 10 10 10px;
	}
	input{
		border-radius: 5px;
	}
.test{
	text-align: left;
}
</style>
</head>
<body style="background-color:rgb(102, 140, 255);">
 <div class="container">

    <form class="well form-horizontal" action="addstor.php" method="post"  id="contact_form" style="height: 600px; margin-top:50px; ">
<fieldset >

<!-- Form Name -->
<legend><center><h2><b>Complete Your Order</b></h2></center></legend><br>

<!-- Text input-->

<table align="center">
          			<tr>
                    <td>stock/order</td><td class="test"><input align="left" type="text" name="stor" value="<?php echo "$storr";?>" ></input></td>
                    </tr>
                    <tr>
                    <td>stock name</td><td class="test"><input align="left" type="text" name="name" value="<?php echo $myrow["name"];?>" ></input></td>
                    </tr>
                    <tr>
                    <td>type</td><td class="test"><input type="text" name="type" value="<?php echo $myrow["type"];?>" ></input></td>
                    </tr>
                    <tr>
                    <td>price per kilo</td><td class="test"><input type="number" name="price" value="<?php echo $myrow["price"];?>" ></input></td>
                    </tr>
                    <tr>
                    <td>Quantity in kilos</td><td class="test"> <input type="number" name="quantity" value="<?php echo $myrow["quantity"];?>" ></input></td>
                    </tr>
                    <tr>
                    <td>expiry date</td><td class="test"><input type="date" name="expiry" value="<?php echo $myrow["expiry"];?>" ></input></td>
                    </tr>
                    <tr>
                    <td>Customer name</td><td class="test"><input type="text" name="ctname" ></input></td>
                    </tr>
                    <tr>
                    <td>Customer address</td ><td class="test"><input type="text" name="ctadd" ></input></td>
                    </tr>
                    <tr>
                    <td>customer contact</td><td class="test"><input type="number" name="ctcontact"></input></td>
                    </tr>
                    <tr>
                    <td><input type="submit" ><a href="#"></a></input></td> <td class="test"><button type="cancel" ><a  href="managerorder.php"> Cancel</a></button></td>
                    </tr>

                  </table>
                  </form>
</fieldset>
</form>
</div>
    </div><!-- /.container -->
</body>
</html>
<?php }elseif ($storr == "order") {
                    $error = "Cant find requested stock.";
                      echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='managerorder.php';</script>";
          }
                  else{
                    $error = "Want to add new stock?";
              echo "<script type=\"text/javascript\">window.alert('.$error.') ; </script>";
              //header('Location: ' . $_SERVER['HTTP_REFERER']);
                  }?>

