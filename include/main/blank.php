<?php
	ob_start();
	session_start();
	$directory = explode("/", $_GET['module']);
	include "/var/www/FYP2023.com/include/system/dbConnection.php";
	include "/var/www/FYP2023.com/include/class/class.php";
	include "/var/www/FYP2023.com/include/system/content.php";
?>
