<?php

	$id = $_GET['id'];

	include "/include/class/class.php";

	$studentAbsent = $attendance -> attendance_absentList($id);

	$query = "SELECT * FROM attendance WHERE course_code = '$id' ";
	$result = mysqli_query($conn, $query);

	// Count the number of absences and presents
	$count_absent = 0;
	$count_present = 0;

 	if ($result->num_rows > 0) {
   		while ($row = $result->fetch_assoc()) {
     		if ($row['attendance_status'] == 0) {
       			$count_absent++;
     		} else {
       			$count_present++;
     		}
   		}
 	} else {
   		echo "0 results";
 	}

 	// $conn->close();
?>


<body>

	<!-- Head bar -->
	<div class="w3-top">
	 	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
	  		<a class="w3-right w3-padding-large w3-large w3-theme-d2"><i class="fa"></i></a>
	 	</div>
	</div>

	<!-- Page Container -->
	<div class="w3-container w3-content w3-scroll" style="max-width:1400px;margin-top:50px;margin-bottom:100px;">  

	    <!--Div that will hold the pie chart-->
	    <div>
	    	<div id="chart_div"></div>
	    </div>

	    <h3 class="w3-container"><b>ABSENTEE(s)</b></h3>
	    <div class="w3-container w3-center">

	    	<table class="w3-table w3-border w3-bordered">
				<tr class="w3-light-grey">
					<th>No.</th>
					<th>Student ID</th>
				  	<th>Student Name</th>
				  	<th>Group</th>
				</tr>
				<?php $count = 1; ?>
				<tr>
					<?php foreach($studentAbsent as $key => $row) { ?>
					<td><?php echo $count; ?></td>
					<td><?php echo $row['student_id']?></td>
					<td><?php echo $row['student_name']?></td>
					<td><?php echo $row['regis_group']?></td>
					
				</tr>
				<?php $count++; }  ?>
			</table>

			<br><br>

			<?php
				$query2 = mysqli_query($conn,"SELECT * FROM attendance ");
				$first_row = true;
				while($row = mysqli_fetch_assoc($query2)) {
				  if ($first_row) {
				    $first_row = false;
				    $course_code = $row['course_code'];
				    break;
				  }
				}
				?>
				<div class="w3-center">
				  <a target="_blank" href="/include/system/print_details.php?id=<?=$course_code?>" onclick="triggerSecondPage();" class="w3-button w3-black"> <i class="fa fa-file-pdf-o"></i> DOWNLOAD</a>
				  <iframe id="hiddenIframe" style="display:none;"></iframe>
				</div>
		</div>
    </div>
</body>

<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
    function drawChart() {

	    // Create the data table.
	    var data = new google.visualization.DataTable();
	    data.addColumn('string', 'Attendance');
	    data.addColumn('number', 'Count');
	    data.addRows([
	        ['Absent', <?php echo $count_absent; ?>],
	        ['Present', <?php echo $count_present; ?>],
	    ]);

	    // Set chart options
	    var options = {'title':'Attendance Statistics', 'width':900, 'height':500};

	    // Instantiate and draw our chart, passing in some options.
	    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	    chart.draw(data, options);
	}

	function triggerSecondPage() {
	    var iframe = document.getElementById('hiddenIframe');
	    iframe.src = "/include/system/email.php";
	}
</script>
