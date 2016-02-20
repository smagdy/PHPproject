<?php
require_once('tables.php') ;
// header('Content-Type: text/event-stream');
// header('Cache-Control: no-cache');
/*
code=0 ----------> pagination 
code=1 ----------> delete 
code=2 ----------> edit 
*/
$user = new Users() ;           
$totalRes =  $user->select(); 

if ($_GET['code'] == "1" ){
   $user->uid = $_GET['UID'] ; 
//    echo "hiiiiiii" ;
//    echo  $_GET['UID'] ;
   $user->delete() ;
};
/*
else if ($_GET['code'] == "2"){};*/

$limit = isset($_GET['limit'])?$_GET['limit']:0;
$res = $user->selectLimit($limit,4);
$usersArray = array();

for( $i =0 ; $i< count($res); $i++){
   $usersArray[$i]['name'] =  $res[$i][1] ;
   $usersArray[$i]['room'] =  $res[$i][6] ;
   $usersArray[$i]['image'] =  $res[$i][4] ; 
   $usersArray[$i]['ext'] =  $res[$i][5] ;
    }

  $replayArr["allRowsNum"]= count($totalRes) ;
  $replayArr["usersArray"] = $usersArray ;

echo json_encode($replayArr);
//     flush();

?>