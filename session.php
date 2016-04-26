<?php
session_start();

$logout=@$_POST["logout"];
if(isset($logout)){
	session_unset();
	session_destroy();
	header("location: login.php");
}

if(!isset($_SESSION["class_number"]))
header("location:login.php");
?>
