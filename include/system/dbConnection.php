<?php

	// error_reporting(0);
	// date_default_timezone_set("Asia/Kuala_Lumpur");
	
	$host = 'localhost';
	$username = 'geana';
	$password = 'MyP@ssw0rd2024';
	$dbname = 'fyp';

	// Create a connection
	$conn = mysqli_connect($host, $username, $password, $dbname);

	// Check the connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
