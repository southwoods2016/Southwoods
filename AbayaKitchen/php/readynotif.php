<?php
include_once 'connection.php';

$query = mysql_query("Select * from tbl_transactions where Status = 'Ready'");
$count = mysql_num_rows($query);
echo $count;
?>