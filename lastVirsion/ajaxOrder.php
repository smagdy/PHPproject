<?php
    require('tables.php');
    session_start();
    if(isset($_GET['oid'])){
        $orders = new Orders();
        $orders->oid = $_GET['oid'];
        $orders->status='canceled';
        $orders->updateStatus();
    }
    else {
        $orders = new Orders();
        $orders->uid=$_SESSION['userId'];
        if(isset($_GET['all'])){  // all orders
            $data = $orders->select();
        }else
            $data = $orders->selectbykey($_GET['from'], $_GET['to']);
        $response = array();
        for ($i = 0; $i < count($data); $i++) {
            $response[$i]['oid'] = $data[$i]['oid'];
            $response[$i]['uid'] = $data[$i]['uid'];
            $response[$i]['orderDate'] = $data[$i]['orderDate'];
            $response[$i]['amount'] = $data[$i]['amount'];
            $response[$i]['status'] = $data[$i]['status'];
            $response[$i]['comment'] = $data[$i]['comment'];
            $response[$i]['rid'] = $data[$i]['rid'];
            $product = new orderProducts();
            $product->oid = $data[$i]['oid'];
            $Oproducts = $product->selectByOrderId();
            $arr = array();
            for ($j = 0; $j < count($Oproducts); $j++) {
                $arr[$j]['pid'] = $Oproducts[$j]['pid'];
                $arr[$j]['numofItems'] = $Oproducts[$j]['numofItems'];
                $p = new Products();
                $p->pid = $Oproducts[$j]['pid'];
                $pInfo = $p->selectbykey();
                $arr[$j]['pname'] = $pInfo[1];
                $arr[$j]['picture'] = $pInfo[2];
                $arr[$j]['price'] = $pInfo[3];
            }
            $response[$i]['products'] = $arr;
        }
        $response = json_encode($response);
        echo $response;
    }
?>

