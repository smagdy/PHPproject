<?php
require('tables.php');
if(isset($_GET['oid'])){
    $orders = new Orders();
    $orders->oid = $_GET['oid'];
    $orders->status='canceled';
    $orders->updateStatus();
}
else{
    //selectbykey
$users=new Users();
if (isset($_GET['uid'])&&$_GET['uid']!='all'){
    $usersData->uid=$_GET['uid'];
    $usersData=$users->selectbykey();
}
else
    $usersData=$users->select();
    //echo $usersData;
$allusersData=array();
for($u=0;$u<count($usersData);$u++){
    $orders = new Orders();
    $orders->uid = $usersData[$u][0];
    if(isset($_GET['from']) && isset($_GET['to']))
        $data = $orders->selectbydate($_GET['from'],$_GET['to']);
    else //all orders for define user
        $data = $orders->selectbyId();
    $allusersData[$u]['uid']=$usersData[$u][0];
    $allusersData[$u]['name']=$usersData[$u][1];
    $response = array();
    $total=0;
    for ($i = 0; $i < count($data); $i++) {
        $response[$i]['oid'] = $data[$i]['oid'];
        $response[$i]['uid'] = $data[$i]['uid'];
        $response[$i]['orderDate'] = $data[$i]['orderDate'];
        $response[$i]['amount'] = $data[$i]['amount'];
        $total+=$data[$i]['amount'];
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
    $allusersData[$u]['total']=$total;
    $allusersData[$u]['orders']=$response;
}
    $allusersData = json_encode($allusersData);
    echo $allusersData;
}
?>

