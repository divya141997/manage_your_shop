<?php
 	include '../conn.php';
 	session_start();
 	if (isset($_SESSION['login_user'])) {
 		include 'pagenav.php';

		 	
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="pagenav.css" rel="stylesheet">
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
 <script type="text/javascript">
    $(document).ready(function(){
    $("#navbar1-frame").load("navlist.php");
});</script>
 </head>
 <body>
 
 
<nav class="navbar navbar-expand-lg navbar-inverse fixed-top bg-dark" style="position: fixed; top: 0px; width: 100%; border-radius: 0px; background-color: rgb(0, 136, 204); border:none;">
      <div class="container" >
        <a class="navbar-brand" href="#" style="color: black; font-size: 25px;">Manage Your Shop</a>
       
        <div class="collapse navbar-collapse navbar-right" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="list-style: none;">
              <button class="btn btn-primary" style="position: fixed; top: 8px"><a href="../logout.php" style="color: black;">Logout</a></button>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
   
     <nav class="navbar navbar-inverse sidebar" role="navigation" style="position: fixed; top: 50px;  border:none;">
    	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div style="align-content: center;  font-family: sans-serif;">
					<span style="font-size:16px;color: white;" ><img src="../images/profile1.png" style="height: 80px;"></img><br>
						<h1>Manager</h1><h4><?php echo "$name";?></h4></span>
					<div style="color: #999;">
						<p > 
							GENDER - <?php echo "$gender";?> <br> 
							EMAIL - <?php echo "$email";?> <br> 
							ADDRESS - <?php echo "$address";?> <br> 
							CONTACT NO. - <?php echo "$telephone";?> <br>
							DATE OF BIRTH - <?php echo "$dob";?> <br>
							USERNAME - <?php echo "$username";?> <br>
							ID - <?php echo "$id";?> <br>
						</p>

					</div>
				</div>
				
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div id="navbar1-frame">dfsgs</div>
	</nav>
	</body>
 </html>
  <?php
}
 	else{
 		$error = "Login required.";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='../home/index.html';</script>";
 	}?>
