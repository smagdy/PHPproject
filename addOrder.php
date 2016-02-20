<?php
require('tables.php');

$products=$_POST['products'];
$order=new Orders();
$order->uid=$_POST['uid'];
$order->amount=$_POST['amount'];
$order->status=$_POST['state'];
$order->comment=$_POST['comment'];
$order->rid=$_POST['rid'];
$oid=$order->insert();

foreach ($products as $p) {
    $p=json_decode($p);
    $orderProducts=new orderProducts();
    $orderProducts->oid=$oid;
    $orderProducts->pid=$p->pid;
    $orderProducts->numofItems=$p->numofItems;
    $orderProducts->insert();
}
?>