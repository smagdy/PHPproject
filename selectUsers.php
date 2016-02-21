<?php
require('tables.php');
$users=new Users();
$data=$users->selectUserName();
$response =json_encode($data);
echo $response;
?>