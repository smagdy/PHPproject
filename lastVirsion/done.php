<?php
require('tables.php');
$name= $_POST['name'];
$email= $_POST['email'];
$pwd= $_POST['pwd'];
$confirmpwd= $_POST['confirmpwd'];
$EXT=$_POST['EXT'];
$room=$_POST['room'];
$flag=true;
$pattern="/^[a-z][a-z0-9]*[_.\-a-z]?@[a-z0-9]+\.([a-z]{2,4})|([a-z]{2,4}\.[a-z]{2})/i";
$erormessage='';
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
if(empty($confirmpwd)) {
    $erormessage.= 'Error you must enter comfirmpwd <br>';
    $flag = false;
}
if(strcmp($pwd,$confirmpwd)) {
    $erormessage.= 'Error password not equal comfirm password <br>';
    $flag = false;
}
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
elseif($_FILES['profileimage']['type'] != 'image/png'&&$_FILES['profileimage']['type'] != 'image/jpeg'&&$_FILES['profileimage']['type'] != 'image/gif')
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
$upfile = "images/".$_FILES['profileimage']['name'];
if (!move_uploaded_file($_FILES['profileimage']['tmp_name'], $upfile)) {
    $erormessage.= "can't move image <br>";
    $flag=false;
}
if($flag == false)
    echo "<h4 class='alert-danger'>".$erormessage."</h4>";
else{
    $user=new Users();
    $user->name=$name;
    $user->email=$email;
    $user->EXT=$EXT;
    $user->rid=$room;
    $user->password=md5($pwd);
    $user->profilePicture=$upfile;
    $user->insert();
    header('Location:admin.php');
}
?>

