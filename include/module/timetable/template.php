<!DOCTYPE html>
<html>

	<?php
		// error_reporting(E_ERROR | E_PARSE);
		include "include/system/dbConnection.php";
		include "include/class/class.php";
		include "include/system/head.php";
	?>


	<style>

		.container {
	  		display: flex;
	  		align-items: left;
	  		justify-content: left;
		}

  	</style>

	<head>

		<title>ATTENDANCE LIST</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<div class="container w3-margin-top">
	      	<div style="margin-left: 20px; margin-top: 20px; margin-right: 20px;">
	        	<img src="/fyp/include/images/LogoUiTM2.png" style="height:90px;width:90px" alt="Avatar">
	      	</div>

	      	<div style="margin-top: 30px;">
	        	<p class="w3-medium" style="padding: 0px; margin: 0px;">UNIVERSITI TEKNOLOGI MARA.</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px;">BAHAGIAN HAL EHWAL AKADEMIK,</p>
				<p class="w3-small" style="padding: 0px; margin: 0px;">40450 SHAH ALAM, SELANGOR DARUL EHSAN.</p>
	      	</div>
	    </div>

	</head>

	<body>

		<div class="container w3-margin-top">
	      	<div class="w3-padding-large">
	      		<p class="w3-small" style="padding: 0px; margin: 0px;">COURSE</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px;">PROGRAMME</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px;">GROUP</p>
				<p class="w3-small" style="padding: 0px; margin: 0px;">SEMESTER</p>
	      	</div>

	      	<div class="w3-padding-large">
	        	<p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
				<p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
	      	</div>

	      	<div class="w3-padding-large" style="margin-bottom: 20px;">
	        	<p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;">ITT610</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;">CS255</p>
	        	<p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;">6B</p>
				<p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;">OCT 2023 - MAC 2024</p>
	      	</div>
	    </div>

		<div class="w3-container">

			<table class="w3-table w3-bordered">
			    <tr>
			      	<th>No.</th>
			      	<th>Student ID</th>
			      	<th>Name</th>
			      	<th>Status</th>
			    </tr>
			    <tr>
			      	<td></td>
			      	<td></td>
			      	<td></td>
			      	<td></td>
			    </tr>
			</table>
		</div>

	</body>
</html>
