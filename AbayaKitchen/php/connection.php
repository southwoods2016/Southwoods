<?php
$servername = "localhost";
$username = "root";
$password = "root";

$con = mysql_connect($servername,$username,$password);
$db = mysql_select_db("uhac4",$con);
?>