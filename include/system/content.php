<?php

	$studentDetail = $student -> student_selected($_GET['data']);
	$studentAttend = $attendance -> attendance_update($_GET['data']);
?>

<body class="w3-theme-l5">

	<!-- Head bar -->
	<div class="w3-top">
	 	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
	  		<a class="w3-right w3-padding-large w3-large w3-theme-d2"><i class="fa"></i></a>
	 	</div>
	</div>

	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   
	  	
	  	<!-- The Grid -->
		<div class="w3-row">
		    
		    <!-- Left Column -->
			<div class="w3-col m12">
			    

				    <!-- Profile -->
				    <div class="w3-card w3-round w3-white w3-table">
				        <div class="w3-container">
				         	<p class="w3-center"><img src="/include/images/<?php echo $studentDetail['student_img'] ?>" class="w3-circle" style="height:120px;width:120px" alt="Avatar"></p>
				         	<hr>
					        <div class="w3-responsive">
								<table class="w3-table w3-margin-bottom">
									<tbody>
										<tr>
											<td>STUDENT ID</td>
											<td>
												<input type="text" name="stuID" id="stuID" value="<?php echo $studentDetail['student_id'] ?>" readonly>
											</td>
										</tr>
										<tr class="w3-white">
											<td>FULL NAME</td>
											<td>
												<input type="text" name="name" id="name" value="<?php echo $studentDetail['student_name'] ?>" readonly>
											</td>
										</tr>
										<tr>
											<td>PROGRAMME</td>
											<td>
												<input type="text" name="prog" id="prog" value="<?php echo $studentDetail['prog_code'] ?>" readonly>
											</td>
										</tr>
										<tr class="w3-white">
											<td>PART</td>
											<td>
												<input type="text" name="part" id="part" value="<?php echo $studentDetail['student_part'] ?>" readonly>
											</td>
										</tr>
										
									</tbody>
								</table>
							</div>
				    	</div>
				    <!-- End Profile -->	
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
