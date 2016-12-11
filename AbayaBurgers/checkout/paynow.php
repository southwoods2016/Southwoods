<?php
session_start();
include_once '../connection.php';
$orderid = time();
$sender = $_GET['accountno'];
$receiver = '101484354700';
$amount = $_GET['amountdue'];
$totalquantity = $_GET['quantity'];
$ordertype = $_GET['ordertype'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.us.apiconnect.ibmcloud.com/ubpapi-dev/sb/api/RESTs/transfer",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"channel_id\":\"BLUEMIX\",\"transaction_id\":\"$orderid\",\"source_account\":\"$sender\",\"source_currency\":\"php\",\"target_account\":\"$receiver\",\"target_currency\":\"php\",\"amount\":$amount}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "content-type: application/json",
    "x-ibm-client-id: a4d52cc0-8799-4333-87aa-86a8cb22d815",
    "x-ibm-client-secret: vB1sF3nJ1nQ0tP0aG4nX0sF4dN8fV6qG3xV1fA4kC6dM0sN4aX"
  ),
));
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response);
    $error =  $data->error_message;
	$status = $data->status;
	
	$time = 5 * $totalquantity;
	if($status == 'S')
	{
		
		foreach ($_SESSION["my_cart"] as $item)
        {
			
            $id = $item['id'];
			$quantity = $_SESSION['$id'];
			
			$query = mysql_query ("Select * from tbl_list where ID = '$id'");
            $row = mysql_fetch_array($query);
			$name = $row['Name'];
			$insert = mysql_query("Insert into tbl_orders values ('$orderid','$name','$quantity','Pending')")or die (mysql_error());
        }
		
		$insert1 = mysql_query("Insert into tbl_transactions(AccountNo,OrderID,OrderType,DateOrdered,TotalPrice,Status) values ('$sender','$orderid','$ordertype',NOW(),'$amount','Pending')")or die (mysql_error());
		
		
		echo "<center>";
		echo "<br><br>";
		echo "<h3>Order successfully paid.</h3>";
		echo "<h2>Order ID: ".$orderid."</h2>";
		echo "<h3>Time to complete order: ".$time." Min</h3>";
		echo "<a href='destroy.php'>Go Back</a>";
		echo "</center>";
	}
	else if($status == 'F')
	{
		echo $error;
	}
}

?>