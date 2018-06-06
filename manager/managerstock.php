<?php
    include '../conn.php';
    session_start();
    if($_SESSION['login_user']) {
      $sqlstock = mysqli_query($con,"select * from stock");
      
      SETCOOKIE('home','active',TIME()-10000,"/");
       SETCOOKIE('staff','active',TIME()-10000,"/");
        SETCOOKIE('order','active',TIME()-10000,"/");
      $cookie_name = "stock";
$cookie_value = "active";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  ?>
<html>
<head>
  <title>Manage stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
    $("#navbar-frame").load("navbar.php");
});
  </script>
  <style type="text/css">
    #test{
    	background-color: rgb(255, 128, 128);
    }
  </style>
</head>
<body>
  
        <div id="navbar-frame">dfsgs</div>
        
        <div class="container" align="center" >
   <!-- Trigger the modal with a button -->
   <button class="btn-lg btn-primary " data-toggle="modal" data-target="#myModal" style="position: fixed;top: 80px;left: 1000px; ">ADD</button>
   <button class="btn-lg btn-primary" data-toggle="modal" data-target="#myModal1" style="position: fixed;top: 80px;left: 1100px;">DELETE</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Enter the staff id.</h4>
        </div>
        <div class="modal-body">
           <form action="addstock.php" method="post">
					<table align="center">
		<tr>
		<td>name</td><td><input type="text" name="name"></input></td>
		</tr>
		<tr>
		<td>type</td><td><input type="text" name="type"></input></td>
		</tr>
		<tr>
		<td>price per kilo</td><td><input type="number" name="price"></input></td>
		</tr>
		<tr>
		<td>Quantity in kilos</td><td><input type="number" name="quantity"></input></td>
		</tr>
		<tr>
		<td>expiry date</td><td><input type="date" name="expiry"></input></td>
		</tr>
	
	</table>
        </div>
        <div class="modal-footer">
        	<button type="submit" class="btn btn-default" name="submit">Submit</button>
          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Enter the staff data to be deleted.</h4>
        </div>
        <div class="modal-body">
            <form action="delstaff.php" method="post">
			<table align="center">
				<tr>
				<td>name</td><td><input type="text" name="username"></input></td>
				</tr>
				<tr>
				<td>id</td><td><input type="number" name="id"></input></td>
				</tr>
				<tr>
				<td></td>
				</tr>	
			</table>
        </div>
        <div class="modal-footer">
        	<button type="submit" class="btn btn-default" name="submit">Submit</button>
          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
</div>

       
        
        
	<div style="position: relative;top: 150px; left: 450px; max-width: 800px;">
	         <table align="left" style=" align-content: left; width: 800px;">
	         <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>TYPE</th>
            <th>PRICE/kilo</th>
            <th>QUANTITY(kilos)</th>
            <th>EXPIRY DATE</th>
            
          </tr>
          </thead>
          <?php
          		$today = date("Y-m-d");
              while ($row = mysqli_fetch_assoc($sqlstock)) {
              	if ($row["expired"] ==  '1') {
              		echo "<tr id = 'test'>";
              	}
              	else
              echo "<tr>";        
              echo "<td>";   
              echo $row["id"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["name"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["type"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["price"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["quantity"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["expiry"]; 
              echo "</td>";
              echo "</tr>";
              }
          ?>
</div>

    
</body>
</html>
<?php
    }else{
      $error = "Login required.";
      echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='../home/index.html';</script>";
    }?>