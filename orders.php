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
$res = $order->selectLimit($limit,899);

$ordersArray = array();

for( $i =0 ; $i< count($res); $i++){
  $ordersArray[$i]['date'] =  $res[$i][0] ;
  $ordersArray[$i]['name'] =  $res[$i][1] ;
  $ordersArray[$i]['room'] =  $res[$i][2] ; 
  $ordersArray[$i]['ext']  =  $res[$i][3] ;
  $ordersArray[$i]['amount']=  $res[$i][4] ;  
  $ordersArray[$i]['numofItems']=  7;//$res[$i][4] ; 
  $ordersArray[$i]['image']=  7;//$res[$i][5] ;    
  $ordersArray[$i]['pname ']  = 7;// $res[$i][6] ;
  $ordersArray[$i]['price']  =  7;//$res[$i][7] ;
 
    }
    
  $replayArr["allRowsNum"]= count($totalRes) ;
  $replayArr["ordersArray"] = $ordersArray ;

  $replayArr = json_encode($replayArr);
  echo "data: {$replayArr}\n\n";
  
	flush();	
 // }

?>
