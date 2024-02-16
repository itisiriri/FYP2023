<!DOCTYPE html>
<html>

	<head>

		<?php

			// Start measuring time
    		$start_time = microtime(true);

			//error_reporting(E_ERROR | E_PARSE);
			include "include/system/dbConnection.php";
			include "include/class/class.php";
			include "include/system/head.php";
		?>

	</head>
	
	<body>

		<?php

		// Code to measure execution time

			$studentDetail = $student -> student_selected($_GET['data']);

			if($studentDetail['student_id'] == $_GET['data']){
				include "include/system/content.php";
				include "include/module/timetable/listing.php"; 
			} else {
				include "include/system/non-content.php";
			}

		// End measuring time
	    $end_time = microtime(true);
	    $execution_time = ($end_time - $start_time) * 1000; // Convert to milliseconds

	    // Output execution time
	    echo "<p>Execution time: " . number_format($execution_time, 2) . " milliseconds</p>";

		?>

	</body>

	<footer>

		<?php
			include "include/system/footer.php";
		?>

	</footer>

</html>
