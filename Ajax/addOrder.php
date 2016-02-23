<?php
require('tables.php');

$products=json_decode($_POST['products']);
$order=new Orders();
$order->uid=$_POST['uid'];
$order->amount=$_POST['amount'];
$order->status=$_POST['state'];
$order->comment=$_POST['comment'];
$order->rid=$_POST['rid'];
$oid=$order->insert();

foreach ($products as $p) {
    $orderProducts=new orderProducts();
    $orderProducts->oid=$oid;
    $orderProducts->pid=$p->pid;
    $orderProducts->numofItems=$p->numofItems;
    $orderProducts->insert();
}
?>
