<?php
	include 'conn.php';
	session_start();
	session_destroy();
	echo "<script type=\"text/javascript\">window.location.href='home/index.html';</script>";
?>