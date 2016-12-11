<?php
include_once '../connection.php';
session_start();

if(isset($_SESSION["my_cart"]))
{
        $amountdue = 0;
		$totalquantity = 0;
        foreach ($_SESSION["my_cart"] as $item)
        {
            $id = $item['id'];
			$quantity = $_GET[$id];
			$_SESSION['$id'] = $quantity;
			
			$query = mysql_query ("Select * from tbl_list where ID = '$id'");
            $row = mysql_fetch_array($query);
			
			$totalquantity = $totalquantity + $quantity;
			$amountdue = $amountdue + ($quantity * $row['Price']);
        }
		
		echo "<br>";
		echo "<center>";
		echo "<h3>Account No.</h3>";
		echo "<h2>100513767077</h2>";
		echo "<h3>Amount Due:</h3>";
		echo "<h2>".$amountdue.".00 Php</h2>";
?>
		<form method="GET" action="paynow.php">
		<input type="hidden" name="accountno" value="100513767077">
		<input type="hidden" name="amountdue" value="<?php echo $amountdue; ?>">
		<input type="hidden" name="quantity" value="<?php echo $totalquantity; ?>">
<?php
		echo "<select name='ordertype'>";
		echo "<option value='Dine-in'>Dine-in</option>";
		echo "<option value='Take-out'>Take-out</option>";
		echo "</select><br><br>";

		?>
		<input type="submit" value="Pay Now">
		</form>
		<?php
		echo "</center>";
}
?>