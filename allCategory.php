<?php
///////////////////////////////////
require('tables.php');
$Categorys=new Category();
$data=$Categorys->select();
$response =json_encode($data);
echo $response;
?>
