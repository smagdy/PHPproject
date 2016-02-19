<?php
require('tables.php');
$rooms=new Room();
$data=$rooms->select();
$response =json_encode($data);
echo $response;
?>
