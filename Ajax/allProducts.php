<?php
require_once('tables.php') ;
// header('Content-Type: text/event-stream');
// header('Cache-Control: no-cache');
/*
code=0 ----------> pagination 
code=1 ----------> delete 
code=2 ----------> edit 
*/
$product = new Products() ;           
$totalRes = $product->select(); 

if ($_GET['code'] == "1" ){
   $product->pid = $_GET['PID'] ; 

//////////////////////
    $Product=new Products();
    $Product->pname=$name_product;
    $Product->productPicture=$upimage;
    $Product->price=$price_prodect;
    $Product->available='1';
    $Product->cid=$category;
    //////////////
  //  $product->updatecolumn('pname',$Product->pname);   
}
else if ($_GET['code'] == "2"){
$product=new Products();
    $product->pid=$_GET['pid'];
    $Op=new orderProducts();
    $Op->pid=$_GET['pid'];
    $Op->deleteByPID();
    $product->delete();
}

$limit = isset($_GET['limit'])?$_GET['limit']:0;
$res = $product->selectLimit($limit,4);

$productsArray = array();

for( $i =0 ; $i< count($res); $i++){
   $productsArray[$i]['pid'] =  $res[$i][0] ;
   $productsArray[$i]['name'] =  $res[$i][1] ;
   $productsArray[$i]['price'] =  $res[$i][3] ;
   $productsArray[$i]['image'] =  $res[$i][2] ; 
     }
  $replayArr["limit"]= $limit ;
  $replayArr["allRowsNum"]= count($totalRes) ;
  $replayArr["productsArray"] = $productsArray ;

echo json_encode($replayArr);
//     flush();

?>
