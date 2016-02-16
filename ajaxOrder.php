<?php
    require('tables.php');
    $orders=new Orders();
    $orders->uid=$_GET['uid'];
    $x=implode( '/', $_GET['from'] );
    $dateFrom=$x[2]+'-'+$x[1]+'-'+$x[0];
    $dateTo=$_GET['to'][2]+'-'+$_GET['to'][1]+'-'+$_GET['to'][0];
    $data=$orders->selectbykey($dateFrom,$dateTo);
   // echo $data[0][0];
    $response = array();
    for($i=0;$i<count($data);$i++) {
       // echo $data[$i];
        $x= array();

        $x[0] = $data[$i][0];
        $x[1] =$data[$i][1];
        $x[2]= $data[$i][2];
        $x[3] = $data[$i][3];
        $x[4] = $data[$i][4];
        //$response[$i]=json_encode($x);
        //echo json_encode($x);
      //  echo '|';
    }
    //$response =json_encode($response);
    $response =json_encode($data);
   // echo $response;
?>