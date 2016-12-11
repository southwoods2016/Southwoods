<?php 
include_once 'connection.php';
$query = mysql_query("Select * from tbl_list where Category = 'Beverages'");
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">\
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-sidenav a {padding:20px}
</style>
<body >

<!-- Sidenav (hidden by default) -->
<nav class="w3-sidenav w3-card-2 w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-closenav">Close Menu</a>
  <a href="index.php" onclick="w3_close()">All foods</a><a href="burgers.php" onclick="w3_close()">Burgers</a>
  <a href="pasta.php" onclick="w3_close()">Pasta</a>
  <a href="fries.php" onclick="w3_close()">Fries</a>
  <a href="beverages.php" onclick="w3_close()">Beverages</a>
   <a href="../menu.html" onclick="w3_close()"><strong>Go Back</strong></a>
</nav>

<!-- Top menu -->
<div class="w3-top" id="top">
  <div class="w3-white w3-xlarge w3-padding-xlarge" style="max-width:1300px;margin:auto"><div class="w3-opennav w3-left w3-hover-text-grey" onclick="w3_open()"><span class="glyphicon glyphicon-list-alt"></span></div>
    <div class="w3-right"> 

<a id="cart" href="view_tray.php">
  <img src="55.png" alt="HTML tutorial" style="width:35px;height:25px;border:0">
</a>
  </div><div class="w3-center" id="burg"><a href="index.php">Abaya Burger</a></div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">


	<div class = "header"> <h1 style="color:blue;">Beverages</h1> </div>

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <?php 
  while($row = mysql_fetch_array($query))
  {
	  ?>
	  <div class="w3-quarter">
	<a href = "add_order.php?id=<?php echo $row['ID'];?>"><img src="<?php echo $row['Image']; ?>" class="img-thumbnail" alt="Burger" style="width:300px;height:210px"></a>
      <h3><?php echo $row['Name']; ?></h3>
      <h3>Price: <?php echo $row['Price']; ?></h3>
    </div>
	  <?php
  }
  ?>
  </div>
</div>

<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
}
</script>

</body>
</html>
