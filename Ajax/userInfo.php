<?php
session_start();
require_once('../tables.php');
$user=new Users();
$user->uid=$_SESSION['userId'];

?>

$product =new orderProducts();
$product->oid=$data[$i]['oid'];
$Oproducts=$product->selectByOrderId();
$p[$i]=$Oproducts;
