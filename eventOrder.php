<?php
require('tables.php');
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$change=new changes();
$dbLastModified=$change->selectOrdersChangeDate("Orders");
$serverLastModified=$change->selectServerDate("Orders");
$change->updateServerDate("Orders");
if($serverLastModified >= $dbLastModified){
    $orders=new Orders();
    $order->uid=$_GET['id'];
    $data=$orders->selectbykey($_GET['from'],$_GET['to']);
    $response = array();
    $response['uid'] = $data[0];
    $response['pid'] =$data[1];
    $response['orderDate'] = $data[2];
    $response['amount'] = $data[3];
    $response['status'] = $data[4];
    $response =json_encode($response);
    echo "data: {$response}";
    //echo "retry: 3000";
    flush();
}

///////////////////////////////////////////////////////////////////////////////////////**************************
/*
 <script>
		var source = new EventSource("eventOrder.php?id=uid, from=fromDate , to=toDate");
		source.onmessage = function(event) {
			console.log(event.data);
			var x = JSON.parse(event.data);
			console.log(x);
		};
	</script>
 */
?>