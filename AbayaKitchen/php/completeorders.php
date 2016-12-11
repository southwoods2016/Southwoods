<?php
include_once 'connection.php';

$query = mysql_query("Select * from tbl_transactions where Status = 'Completed'");
while($row = mysql_fetch_array($query))
{
?>
	<tr>
        <td><?php echo $row['OrderID']; ?></td>
		<td><?php echo $row['OrderType']; ?></td>
		<td><?php echo $row['AccountNo']; ?></td>
        <td><?php echo $row['DateOrdered']; ?></td>
        <td><?php echo $row['DateCompleted']; ?></td>
		<td><?php echo $row['TotalPrice']; ?></td>
    </tr>
<?php
}

?>