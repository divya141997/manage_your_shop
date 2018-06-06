<?php
 	include 'conn.php';
 	session_start();
 	if ($_SESSION['login_user']) {
 		 	
 ?>
  <button><a href="logout.php">Logout</a></button>
  <ul>
  	<li><a href="accountpay.php">Payment</a></li>
  	<li>order</li>
  	<li><a href="accountsalary.php">Salaries</a></li>
  </ul>
  <?php
}
 	else{
 		$error = "Login required.";
		echo "<script type=\"text/javascript\">window.alert('.$error.') ; window.location.href='index.php';</script>";
 	}?>
