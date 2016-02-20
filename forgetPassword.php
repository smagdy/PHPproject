<?php
require_once('connection.php');
$mysqli =connection::createInstance();
$newPasswordUser=$_GET['value'];
if(isset($_GET['username'])) {
    $nUser = $_GET['username'];
    $query = " update Users set password=md5('" . $newPasswordUser . "') where name like '" . $nUser . "%'  ";
    $mysqli->query($query);
}
?>
