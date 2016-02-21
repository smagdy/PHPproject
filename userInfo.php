<?php
session_start();
require('tables.php');
$user=new Users();
$user->uid=$_SESSION['userId'];
$data=$user->selectbykey();
echo json_encode($data);
?>