<?php
include_once 'connection.php';

$query = mysql_query("Select * from tbl_transactions where Status = 'Pending'");

while($row = mysql_fetch_array($query))
{
?>
	<div class="col-md-4">
    <div class="box box-info">
	     <div class="box-header with-border">
         <h3 class="box-title">Order ID: <big><strong><?php echo $row['OrderID']; ?><strong></big></h3>
         </div>
		 
		 <div class="box-body">
         <div class="table-responsive">
         <table class="table no-margin">
			 <thead>
			 <tr>
			 <th>Item</th>
			 <th>Quantity</th>
			 <th>Status</th>
			 </tr>
			 </thead>
			 <tbody>
<?php
	$query2 = mysql_query("Select * from tbl_orders where OrderID = '$row[OrderID]'");
	while($row1 = mysql_fetch_array($query2))
	{
		?>
		     <tr>
             <td><?php echo $row1['ItemName']; ?></td>
             <td><?php echo $row1['Quantity']; ?></td>
			 <?php
			 if($row1['Status'] == 'Pending')
			 {
			 ?>
             <td><a href="php/update-item.php?orderid=<?php echo $row['OrderID'];?>&itemname=<?php echo $row1['ItemName']; ?>"><span class="fa fa-check"></span>Done</a></td>
			 <?php
			 }
			 ?>
             </tr>
<?php
	}
?>
              </tbody>
		</table>
		</div>
		</div>
		
		<div class="box-footer clearfix">
        <strong class="pull-left">Type: Dine-in</strong>
        <a href="php/update-order.php?orderid=<?php echo $row['OrderID'];?>" class="btn btn-sm btn-info btn-flat pull-right">Ready</a>
        </div>
	</div>
	</div>
<?php
}
?>