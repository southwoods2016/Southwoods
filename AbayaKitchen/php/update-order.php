<?php
include_once 'connection.php';

$orderid = $_GET['orderid'];

$query = mysql_query("Update tbl_transactions set Status = 'Ready' where OrderID = '$orderid'");
$query1 = mysql_query("Update tbl_orders set Status = 'Ready' where OrderID = '$orderid'");
header('location: ../index.html');
?>