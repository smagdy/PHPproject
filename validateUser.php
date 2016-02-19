<?php
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
            $date_of_expiry = time() + 360 ;
            setcookie("admin",$pass,$date_of_expiry );
        }
        $_SESSION['admin'] = "admin";
        header('Location:adminHome.php');
    }
    else{
        if($row[1]==$pass)
        {
            if(isset($_POST['keep']))
            {
                $date_of_expiry = time() + 360 ;
                setcookie('userName',$_POST['userName'],$date_of_expiry );
            }
            $_SESSION['userName'] =$_POST['userName'];
            $_SESSION['userId'] = $row[0];
            header("Location:userHome.php");
        }

    }
}
?>