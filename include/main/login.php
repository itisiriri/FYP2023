<?php
	
	include "include/system/DataBase.php";

	$db = new DataBase();
	
	if (isset($_POST['username']) && isset($_POST['password'])) {
    	if ($db->dbConnect()) {
        	if ($db->logIn("lecturer", $_POST['lecturer_id'], $_POST['lecturer_pass'])) {
            	echo "Login Success";
        	} else echo "Username or Password wrong";
    	} else echo "Error: Database connection";
	} else echo "All fields are required"; 

?>
