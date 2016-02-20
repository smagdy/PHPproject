<?php
require('tables.php');

//$products count(json_decode($_GET['products']));


$order=new Orders();
$order->uid=$_GET['uid'];
$order->amount=$_GET['amount'];
$order->status=$_GET['state'];
$order->comment=$_GET['comment'];
$order->rid=$_GET['rid'];
$order->insert();
$oid=$order->getLastOrderName();
echo $oid;
?>