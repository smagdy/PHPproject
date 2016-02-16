<?php
    require('tables.php');
    $orders=new Orders();
    $orders->uid=$_GET['uid'];
    $data=$orders->selectbykey($_GET['from'],$_GET['to']);
    $response =json_encode($data);
    echo $response;

?>