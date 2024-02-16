<?php

	$examList = $timetable -> timetable_current();

?>


<body class="w3-theme-l5">

	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px">   

		<!-- The Grid -->
		<div class="w3-row">

		    <!-- Left Column -->
		    <div class="w3-col m12">				         
			      
			    <!-- Accordion -->
				<div class="w3-responsive w3-card-4">
					<table id="timetable_table" class="table table-striped table-hover w-100 text-center w3-table w3-striped w3-bordered">
						<tr class="w3-theme">
							<td>#</td>
						  	<td class="w3-center">COURSE HELLO</td>
						  	<td class="w3-center">DATE</td>
						  	<td class="w3-center">START TIME</td>
						  	<td class="w3-center">END TIME</td>
						  	<td class="w3-center">LOCATION</td>
						  	<td class="w3-center">TABLE NO.</td>
						</tr>
						<tr>
						<?php
							foreach($examList as $row){
						?>
							<td><?php echo $row['exam_id']; ?></td>
							<td><?php echo $row['course_code'];	?></td>
							<td><?php echo $row['exam_date']; ?></td>
							<td><?php echo $row['exam_time1']; ?></td>
							<td><?php echo $row['exam_time2']; ?></td>
							<td></td>
						</tr>
						<?php
							}
						?>
					</table>
				</div>
			     
			<!-- End Right Column -->
			</div>
		<!-- End Grid -->
		</div>
		<br>

	<!-- End Page Container -->
	</div>
	<br>
</body>
