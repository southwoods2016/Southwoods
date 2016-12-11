<?php
include_once 'connection.php';

$orderid = $_GET['orderid'];

$query = mysql_query("Update tbl_transactions set Status = 'Completed' where OrderID = '$orderid'");
$query1 = mysql_query("Update tbl_transactions set DateCompleted = NOW() where OrderID = '$orderid'");
$query2 = mysql_query("Update tbl_orders set Status = 'Completed' where OrderID = '$orderid'");

header('location: ../ready-orders.html');
?>