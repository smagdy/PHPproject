<?php
session_start();
require('tables.php');
if(isset($_POST['userName']) && isset($_POST['userPass']))
{
    /////-----get data from database------////
    $user=new Users();
    $user->name=$_POST['userName'];
    $row=$user->selectbyName();
    $pass=md5(trim($_POST['userPass']));
    ///////////////////////////////
    if(trim($_POST['userName'])=="admin"&&$pass==$row[1]){
        if(isset($_POST['keep']))
        {
            $date_of_expiry = time() + 3600 ;
            setcookie("admin",$pass,$date_of_expiry );
        }
        $_SESSION['admin'] = "admin";
        header('Location:adminHome.php');
    }
    else{
        echo $_POST['userName'].' '.$row[1].'---'.$pass;
        if($row[1]==$pass)
        {
            if(isset($_POST['keep']))
            {
                $date_of_expiry = time() + 3600 ;
                setcookie('userName',$_POST['userName'],$date_of_expiry );
            }
            $_SESSION['userName'] =$_POST['userName'];
            $_SESSION['userId'] = $row[0];
            header("Location:userHome.php");
        }else header("Location:index.html");

    }
}
?>