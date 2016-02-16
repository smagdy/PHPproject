<?php
    require('tables.php');
    $orders=new Orders();
    $orders->uid=$_GET['uid'];
    $data=$orders->selectbykey($_GET['from'],$_GET['to']);
    //echo $data;
  //  echo $data[0][0];
   /* $response = array();
    for($i=0;$i<count($data);$i++) {
       // echo $data[$i];
        $x= array();

        $x[0] = $data[$i][0];
        $x[1] =$data[$i][1];
        $x[2]= $data[$i][2];
        $x[3] = $data[$i][3];
        $x[4] = $data[$i][4];
        $response[$i]=json_encode($x);
    }
    $response =json_encode($response);*/
    $response =json_encode($data);
    echo $response;

?>