<?php
	$subject =  $attendance -> attendance_sub();
?>

<head>
	
	<style>

		.button {
		  background-color: #04AA6D; /* Green */
		  border: none;
		  color: white;
		  padding: 20px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  cursor: pointer;
		}

		.button2 {
			border-radius: 8px;
			background-color: orange;
			width: 100%;
		}

	</style>

</head>

<body class="w3-theme-l5">
	
	<!-- Head bar -->
	<div class="w3-top">
	 	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
	  		<a class="w3-right w3-padding-large w3-large w3-theme-d2"><i class="fa"></i></a>
	 	</div>
	</div>

	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px; margin-top:80px">   
	  	
	  	<!-- The Grid -->
		<div class="w3-row">
		    
		    <!-- Left Column -->
			<div class="w3-col m12">

		        <div class="w3-container w3-center">

		        	<?php
						foreach($subject as $row){
					?>
					<!-- Profile -->
			        	<a class="button button2" id="course" value="<?php echo $row['course_code'];?>" href="test.php?course=<?php echo $row['course_code'];?>"><?php echo $row['course_code'];?></a>

		        	<?php
						}
					?>

		        </div>

			<!-- End Left Column -->
			</div>

		<!-- End Grid -->
		</div>
		<br>

	<!-- End Page Container -->
	</div>
	<br>

</body>
