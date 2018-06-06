<?php
    include('../conn.php');
    session_start();
    if($_SESSION['login_user']) {
      $sqlstaff = mysqli_query($con,"select * from staff");
      SETCOOKIE('home','active',TIME()-10000,"/");
       SETCOOKIE('stock','active',TIME()-10000,"/");
       SETCOOKIE('order','active',TIME()-10000,"/");
setcookie('staff', 'active', time() + (86400 * 30), "/");
  ?>
<html>
<head>
	<title>Manage staff</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
	<link href="pagenav.css" rel="stylesheet">
	<style type="text/css">


	</style>
	<script type="text/javascript">
  	$(document).ready(function(){
    $("#navbar-frame").load("navbar.php");
});
  </script>
	<script type="text/javascript">
	    function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
		}
		$(document).ready(function () {
			htmlbodyHeightUpdate()
			$( window ).resize(function() {
				htmlbodyHeightUpdate()
			});
			$( window ).scroll(function() {
				height2 = $('.main').height()
	  			htmlbodyHeightUpdate()
			});
		});
</script>
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
            <form action="addstaff.php" method="post">
			<table align="center">
				<tr>
				<td>name</td><td><input type="text" name="name"></input></td>
				</tr>
				<tr>
				<td>id</td><td><input type="number" name="staffid"></input></td>
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

       
        
        
	<div style="position: relative;top: 150px; left: 350px; max-width: 1000px;">
	         <table align="left" style=" ">
	         <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>GENDER</th>
            <th>ROLE</th>
            <th>EMAIL ID</th>
            <th>BIRHDATE</th>
            <th>ADDRESS</th>
            <th>TELEPHONE</th>
          </tr>
          </thead>
          <?php
              while ($row = mysqli_fetch_assoc($sqlstaff)) {
              echo "<tr>";        
              echo "<td>";   
              echo $row["id"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["name"]; 
               echo "<td>";   
              echo $row["gender"]; 
              echo "</td>";
              echo "</td>";
              echo "<td>";   
              echo $row["role"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["email"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["dob"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["address"]; 
              echo "</td>";
              echo "<td>";   
              echo $row["telephone"]; 
              echo "</td>";
              echo "</tr>";
            }
          ?>
</div>

	  		
  	<?php
		}else{
 			$error = "Login required.";
			echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='../../home/index.html';</script>";
 		}?>
</body>
</html>