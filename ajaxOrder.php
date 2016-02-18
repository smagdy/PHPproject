<?php
    require('tables.php');
    $orders=new Orders();
    $orders->uid=$_GET['uid'];
    $data=$orders->selectbykey($_GET['from'],$_GET['to']);
    for($i=0;$i<count($data);$i++){
    	$product =new Products();
    	$product->pid=$data[$i][pid];
    	$res=$product->selectbykey();
    	$data[$i]['pid']=$res;	
    }
    $response =json_encode($data);
    echo $response;
?>
