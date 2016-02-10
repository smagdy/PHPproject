<?php
require('tables.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap-Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- script src="js/jscript.js"></script -->
</head>
<body>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-offset-2 col-sm-6">
                <?php
                //var_dump($_POST);
                $fname= $_POST['name'];
                $email= $_POST['email'];
                $pwd= $_POST['pwd'];
                $ext=$_POST['EXT'];
                $room=$_POST['room'];
                $flag=true;
                $pattern="/^[a-z][a-z0-9]*[_.\-a-z]?@[a-z0-9]+\.([a-z]{2,4})|([a-z]{2,4}\.[a-z]{2})/i";
                $erormessage='';
                if($_FILES['profileimage']['error'] > 0)
                {
                    $erormessage.=  'Problem: ';
                    switch ($_FILES['profileimage']['error'])
                    {
                    case 1: $erormessage.= 'File exceeded upload_max_filesize <br>';
                    break;
                    case 2: $erormessage.=  'File exceeded max_file_size <br>';
                    break;
                    case 3: $erormessage.=  'File only partially uploaded <br>';
                    break;
                    case 4: $erormessage.=  'No file uploaded <br>';
                    break;
                    case 6: $erormessage.=  'Cannot upload file: No temp directory specified <br>';
                    break;
                    case 7: $erormessage.=  'Upload failed: Cannot write to disk <br>';
                    break;
                    }
                    $flag=false;
                }
                elseif($_FILES['profileimage']['type'] != 'image/png')
                {
                    echo $_FILES['profileimage']['type'];
                    $erormessage.= 'Problem: file is not image <br>';
                    $flag=false;
                }
                if (!is_uploaded_file($_FILES['profileimage']['tmp_name']))
                {
                    $erormessage.='Problem: Possible file upload attack. <br>';
                    $flag=false;
                }
                if(empty($name)){
                    $erormessage.='Error you must enter name <br>';
                    $flag=false;
                }
                if(empty($email)){
                    $erormessage.= 'Error you must enter email <br>';
                    $flag = false;
                } elseif(!preg_match($pattern,$email))
                {
                    echo preg_match($pattern,$email);
                    $erormessage.= 'Error you must enter vaild email <br>';
                    $flag = false;
                }
                if(empty($room)) {
                    $erormessage.= 'Error you must select Room Number<br>';
                    $flag = false;
                }
                if(empty($EXT)) {
                    $erormessage.= 'Error you must select EXT Number<br>';
                    $flag = false;
                }
                if(empty($pwd)) {
                    $erormessage.= 'Error you must enter pwd <br>';
                    $flag = false;
                }
                echo "<h4 class='alert-danger'>".$erormessage."</h4>";
                if($flag == true) {
                    $upfile = $_FILES['profileimage']['name'];
                    if (!move_uploaded_file($_FILES['profileimage']['tmp_name'], $upfile)) {
                       echo "can't move image <br>";
                    }
                    $user=new Users();
                    $user->name=$name;
                    $user->email=$email;
                    $user->rid=$room;
                    $user->EXT=$EXT;
                    $user->password=md5($pwd);
                    $user->profileimage=$_FILES['profileimage']['name'];
                    $user->insert();
                    echo "<br><form action='admin.php' method='POST'><input type='submit' name='admin' class='alert-info' value='Go to Admin'/></form>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
