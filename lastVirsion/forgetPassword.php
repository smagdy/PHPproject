<?php
require_once('connection.php');
$mysqli =connection::createInstance();
$newPasswordUser=$_GET['value'];
$nUser=$_GET['username'];
$query = " update Users set password='".$newPasswordUser."' where name like '".$nUser."%'  ";
$mysqli->query($query);
	    
?>
