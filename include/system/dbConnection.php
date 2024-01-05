<?php

	// error_reporting(0);
	// date_default_timezone_set("Asia/Kuala_Lumpur");
	
	$host = 'localhost';
	$port = 3307;
	$username = 'root';
	$password = '';
	$dbname = 'fyp';

	// Create a connection
	$conn = mysqli_connect($host, $username, $password, $dbname, $port);

	// Check the connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>