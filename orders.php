<?php
require_once('tables.php') ;
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$order = new Orders () ;
$totalRes = $order->select();

/*
if ($_GET['code'] == "1" ){
   $user->uid = $_GET['UID'] ; 
   $user->delete() ;
};
*/

//if(){
	
$limit = isset($_GET['limit'])?$_GET['limit']:0;
// echo $limit ;
// echo $_GET['code'] ;
$res = $order->selectLimit($limit,2);

$ordersArray = array();

for( $i =0 ; $i< count($res); $i++){
      $ordersArray[$i]['date'] =  $res[$i][0] ;
      $ordersArray[$i]['name'] =  $res[$i][1] ;
      $ordersArray[$i]['room'] =  $res[$i][2] ; 
      $ordersArray[$i]['ext']  =  $res[$i][3] ;
      $ordersArray[$i]['amount']=  $res[$i][4] ;  
      $ordersArray[$i]['oid']=  $res[$i][5] ; 
  
      $product = new orderProducts();
      $product->oid = $ordersArray[$i]['oid'];
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
      $ordersArray[$i]['products'] = $arr;
     
    
    }
  $replayArr["limit"]= $limit ;  
  $replayArr["allRowsNum"]= count($totalRes) ;
  $replayArr["ordersArray"] = $ordersArray ;

  $replayArr = json_encode($replayArr);
//  echo "data: {$replayArr}\n\n";
  echo $replayArr ;
	flush();	
 // }

?>
