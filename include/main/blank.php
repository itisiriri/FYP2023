<?php
	ob_start();
	session_start();
	$directory = explode("/", $_GET['module']);
	include "include/system/dbConnection.php";
	include "include/class/class.php";
	include "include/system/content.php";
?>
