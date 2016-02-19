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

    if(trim($_POST['userName'])=="admin"&&$pass==$row[0]){
        if(isset($_POST['keep']))
        {
            $date_of_expiry = time() + 360 ;
            setcookie("admin",$pass,$date_of_expiry );
        }
        $_SESSION['admin'] = "admin";

        header('Location:adminHome.php');
    }
    else{
        if($row[0]==$pass)
        {
            if(isset($_POST['keep']))
            {
                $date_of_expiry = time() + 360 ;
                setcookie('userName',$row[1],$date_of_expiry );
            }
            $_SESSION['userName'] = $row[1];
            $_SESSION['userId'] = $row[0];
            header("Location:userHome.php");
        }

    }
}
?>