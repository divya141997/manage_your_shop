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

 </head>
 <body>
  <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1" style="position: absolute;top:350px;">
				<ul class="nav navbar-nav">

					<li class="<?php echo "$_COOKIE[home]"?>"><a href="mandash.php"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>&nbsp&nbspHome</a></li>
					
					<li class="dropdown <?php echo "$_COOKIE[staff]"?>">
						<a href="managerstaff.php">&nbsp&nbspStaff <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
						<ul class="dropdown-menu forAnimate" role="menu">
							<li><a href="addstaff1.php">Add staff</a></li>
							<li><a href="delstaff1.php">Delete staff</a></li>
						</ul>
					</li>

					<li class="<?php echo "$_COOKIE[order]"?>">
						<a href="managerorder.php">&nbsp&nbspOrder <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a>
						<ul class="dropdown-menu forAnimate" role="menu">
							<li><a href="addorder1.php">Add order</a></li>
							<li><a href="delorder1.php">Delete order</a></li>
						</ul>
					</li>
					
					<li class="dropdown <?php echo "$_COOKIE[stock]"?>">
						<a href="managerstock.php" >&nbsp&nbspStock <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
						<ul class="dropdown-menu forAnimate" role="menu">
							<li><a href="addstaff1.php">Add stock</a></li>
							<li><a href="delstaff1.php">Delete stock</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</body>
			</html>