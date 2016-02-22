<?php
session_start();
if(isset($_SESSION['userName']))
{
	setcookie ('userName',$_COOKIE['user'],mktime());
	unset($_SESSION['userName']);
	unset($_SESSION['userId']);
	session_destroy();
	header('Location:../index.html');
}
if(isset($_SESSION['admin']))
{
	setcookie ('admin',$_COOKIE['admin'],mktime());
	unset($_SESSION['admin']);
	session_destroy();
	header('Location:../index.html');
}
?>
