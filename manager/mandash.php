<?php
    include '../conn.php';
    session_start();
    if($_SESSION['login_user']) {
      $sql = mysqli_query($con,"select * from stock");
      SETCOOKIE('stock','active',TIME()-10000,"/");
       SETCOOKIE('staff','active',TIME()-10000,"/");
        SETCOOKIE('order','active',TIME()-10000,"/");
     	$cookie_name = "home";
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
    th,td{
      border-width: 1px;
      border-color: GREY;
      border-style: solid;
    }
  </style>
</head>
<body>
  
        <div id="navbar-frame">dfsgs</div>
        
    
</body>
</html>
<?php
    }else{
      $error = "Login required.";
      echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='../home/index.html';</script>";
    }?>