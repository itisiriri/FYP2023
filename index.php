<!DOCTYPE html>
<html>

	<head>

		<?php
			//error_reporting(E_ERROR | E_PARSE);
			include "include/system/dbConnection.php";
			include "include/class/class.php";
			include "include/system/head.php";
		?>

	</head>
	
	<body>

		<?php

			$studentDetail = $student -> student_selected($_GET['data']);

			if($studentDetail['student_id'] == $_GET['data']){
				include "include/system/content.php";
				include "include/module/timetable/listing.php"; 
			} else {
				include "include/system/non-content.php";
			}

		?>

	</body>

	<footer>

		<?php
			include "include/system/footer.php";
		?>

	</footer>

</html>