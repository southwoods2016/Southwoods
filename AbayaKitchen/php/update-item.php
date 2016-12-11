<?php
include_once 'connection.php';

$orderid = $_GET['orderid'];
$itemname = $_GET['itemname'];

$query = mysql_query("Update tbl_orders set Status = 'Ready' where OrderID = '$orderid' and ItemName = '$itemname'");
header('location: ../index.html');
?>