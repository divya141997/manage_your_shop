<?php
    include '../conn.php';
    session_start();
    if($_SESSION['login_user']) {
      $sqlstock = mysqli_query($con,"select * from stock");
      $row = mysqli_fetch_assoc($sqlstock);
      SETCOOKIE('home','active',TIME()-10000,"/");
       SETCOOKIE('staff','active',TIME()-10000,"/");
       SETCOOKIE('stock','active',TIME()-10000,"/");
 
      $cookie_name = "order";
$cookie_value = "active";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  ?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
 <script>
        var divs = ["Menu1", "Menu2"];
var visibleDivId = null;
function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    //visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  var i, divId, div;
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}
function search(stoname,stotype){

}
$("#stoname","#stotype").bind("change", function(e){
  $.getJSON("chechstock.php?stoname=" + $("#stoname").val(),"checkstock.php?stotype=" + $("#stotype").val(),
        function(data){
          $.each(data, function(i,item){
            if (item.field == "price") {
              $("#price").val(item.value);
            } else if (item.field == "quantity") {
              $("#quantity").val(item.value);
            }
          });
        });
});

    </script>
</head>
<body>
  
  <div id="navbar-frame">dfsgs</div>
        
  <div class="container" align="center" >
    <!-- Trigger the modal with a button -->
    <div name= 'buttons'>
     <button class="btn-lg btn-primary " data-toggle="modal" data-target="#myModal" style="position: fixed;top: 80px;left: 700px; ">ADD</button>
     <button class="btn-lg btn-primary" data-toggle="modal" data-target="#myModal1" style="position: fixed;top: 80px;left: 780px;">DELETE</button>
     <button class="btn-lg btn-primary " data-toggle="modal" data-target="#myModal" style="position: fixed;top: 80px;left: 890px; ">STOCK</button>
     <button class="btn-lg btn-primary " data-toggle="modal" data-target="#myModal" style="position: fixed;top: 80px;left: 993px; ">ORDER</button>
     <button class="btn-lg btn-primary " data-toggle="modal" data-target="#myModal" style="position: fixed;top: 80px;left: 1100px; ">CUSTOMER</button>
    </div>

  </div>
    
       
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Enter the staff id.</h4>
            </div>
            <div class="modal-body">
            <form action="checkstock.php" method="post">
                  <table align="center">
                    <tr>
                    <td>Stock/Order</td><td><select name="stor" >
                      <option value="stock">Stock </option>
                      <option value="order">Order</option>
                   </select></td>
                    </tr>
                    <tr>
                    <td>stock name</td><td><input type="text" name="stname" ></input></td>
                    </tr>
                    <tr>
                    <td>type</td><td><input type="text" name="sttype"></input></td>
                    </tr>
                    <tr>
                    <td><button type="submit">submit</button></td>
                    </tr>
                  </table>
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