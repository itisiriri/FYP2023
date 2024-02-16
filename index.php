<!DOCTYPE html>
<html>

	<head>

		<?php
			error_reporting(E_ERROR | E_PARSE);
			include "/var/www/FYP2023.com/include/system/dbConnection.php";
			include "/var/www/FYP2023.com/include/class/class.php";
			include "/var/www/FYP2023.com/include/system/head.php";
		?>

	</head>
	
	<body>

		<?php

			$studentDetail = $student -> student_selected($_GET['id']);

			if($studentDetail['student_id'] == $_GET['id']){
				include "/var/www/FYP2023.com/include/system/content.php";
				include "/var/www/FYP2023.com/include/module/timetable/listing.php"; 
			} else {
				include "/var/www/FYP2023.com/include/system/non-content.php";
			}

		?>

	</body>

	<footer>

		<?php
			include "/var/www/FYP2023.com/include/system/footer.php";
		?>

	</footer>

</html>
