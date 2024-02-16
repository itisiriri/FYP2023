<!DOCTYPE html>
<html>

<?php
	$id = $_GET['id'];;

	$timeSub = $timetable -> timetable_subject($id);
?>


<body>

	<!-- $id = $_GET['id']; -->

	<!-- Head bar -->
	<div class="w3-top">
	 	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
	  		<a class="w3-right w3-padding-large w3-large w3-theme-d2"><i class="fa"></i></a>
	 	</div>
	</div>


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;margin-bottom:100px;">  

		<h3><b>SUBJECT LIST</b></h3>

		<table class="w3-table w3-border w3-bordered">
			<tr>
				<td>No.</td>
				<td>Date</td>
				<td>Start Time</td>
				<td>End Time</td>
				<td>Subject</td>
				<td></td>
			</tr>
			<tr>
			<?php $count = 1;
				foreach($timeSub as $row) { ?>
				<td><?php echo $count; ?></td>
				<td><?php echo $row['exam_date']; ?></td>
				<td><?php echo $row['exam_time1']; ?></td>
				<td><?php echo $row['exam_time2']; ?></td>
				<td><?php echo $row['course_code']; ?></td>

				<?php 
					$query = mysqli_query($conn,"SELECT * FROM examination e JOIN location l ON l.course_code = e.course_code WHERE l.location_leader = '$id' ORDER BY e.exam_date DESC LIMIT 1");

					while($row1 = mysqli_fetch_assoc($query)) { 
						$current_time = time();
       	 				$exam_time = strtotime($row['exam_date'] . ' ' . $row['exam_time2']);
        				if ($exam_time > $current_time) { ?> 
							<td>
								<a href="index2.php?id=<?=$row['course_code']?>"><i class="fa fa-check" style="font-size:24px"></i></a>
							</td>
						<?php } else { ?>
							<td>
								<a href="index3.php?id=<?=$row['course_code']?>"><i class="fa fa-pie-chart" style="font-size:24px"></i></a>
							</td>
						<?php } ?>
			</tr>
			<?php } $count++; } ?>
		</table>

	</div>
</body>

<script>

</script>

</html>


