<?php
include_once 'connection.php';
session_start();

if(isset($_SESSION["my_cart"]))
{
        $amountdue = 0;
        foreach ($_SESSION["my_cart"] as $item)
        {
            $id = $item['id'];
			$quantity = $_GET[$id];
			
			$query = mysql_query ("Select * from tbl_list where ID = '$id'");
            $row = mysql_fetch_array($query);
			
			$amountdue = $amountdue + ($quantity * $row['Price']);
        }
		//echo $amountdue;
		
		echo "<div class='col-md-4'>";
		echo "Account No.";
		echo "</div>";
}
?>