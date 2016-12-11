<?php
include_once 'connection.php';

$query = mysql_query("Select * from tbl_transactions where Status = 'Ready'");
while($row = mysql_fetch_array($query))
{
?>
	<tr>
    <td><?php echo $row['OrderID']; ?></td>
	<td><?php echo $row['OrderType']; ?></td>
    <td><?php echo $row['AccountNo']; ?></td>
	<td><?php echo $row['DateOrdered']; ?></td>
    <td><a href="php/update-complete.php?orderid=<?php echo $row['OrderID']; ?>"><span class="fa fa-check"></span>Complete</a></td>
    </tr>
<?php
}
?>