<?php
require_once('tables.php') ;
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

  $change = new changes() ;
  $changeTime  = $change->selectChangeDate("Products") ;
  $servertime = $change->selectServerDate("Products");
     
  if($changeTime > $servertime ){
       $change->updateServerDate("Products");
       $product = new Products() ; 
       $res =  $product->select(); 
       $res =  json_encode($res);
       echo "data: {$response}";
	//echo "retry: 3000";
       flush();   
       }
 ?>
  
