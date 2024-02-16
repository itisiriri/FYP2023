<!DOCTYPE html>
<html>
<body>

	<!-- Head bar -->
	<div class="w3-top">
	 	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
	  		<a class="w3-right w3-padding-large w3-large w3-theme-d2"><i class="fa"></i></a>
	 	</div>
	</div>


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">  

	    <h3><b>STUDENT ATTENDANCE LIST</b></h3>

	    <?php

	    $id = $_GET['id'];

	    $host = 'localhost';
		$port = 3307;
		$username = 'root';
		$password = '';
		$dbname = 'fyp';

	    // Establish a database connection
	    $conn = new mysqli($host, $username, $password, $dbname, $port);

	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    // Fetch the student data from the database
	    $sql = "SELECT a.attendance_id, a.student_id, a.attendance_status, s.student_name FROM attendance a JOIN student s ON s.student_id = a.student_id WHERE course_code = '$id' ";

	    $result = $conn->query($sql);

	    $genList = $attendance -> attendance_gen('ITT640');

	    $sql1 = "SELECT * FROM attendance a JOIN student s ON s.student_id = a.student_id JOIN lecturer l ON a.regis_group = l.regis_group WHERE a.course_code = '$id' ";

	    $result1 = $conn->query($sql1);
	    

	    // Check if any results were returned
	    if ($result->num_rows > 0) { ?>
	    	<table class="w3-table w3-border w3-bordered">
				<tr class="w3-light-grey ">
					<th>No.</th>
				  	<th>Student ID</th>
				  	<th>Student Name</th>
				  	<th>Table No.</th>
				  	<th>Status</th>
				</tr>
				<?php $count = 1;?>
				<tr>
					<?php while ($row = $result->fetch_assoc()) { ?>
						<td><?php echo $count?></td>
						<td><?php echo $row['student_id']?></td>
						<td><?php echo $row['student_name']?></td>
						<td></td>
					<?php if ($row['attendance_status'] == 1) { ?>
						<td><i class="fa fa-check"></i></td>
					<?php } if ($row['attendance_status'] == 0) { ?>
						<td><i class="fa fa-close" style="color:red"></i></td>
					<?php }?>
				</tr>
				<?php $count++; } ?>
			</table>
		<?php }
	// Create an array to store the lecturer names
	$lecturerEmail = array();

	// Print array data
	while($row1 = $result1->fetch_assoc()) {
	    // Check if the lecturer name is already in the array
	    if (!in_array($row1["lecturer_email"], $lecturerEmail)) {
	        // If not, add the lecturer name to the array and display it 
	        $lecturerEmail[] = $row1["lecturer_email"];?>
	        <input type="hidden" name="item_name_<?php echo $count;?>" id="item_name_<?php echo $count;?>" value="<?php echo $row1['lecturer_email'];?>" class="form-control" readonly>
	    <?php }
	}
	$query1 = mysqli_query($conn,"SELECT a.attendance_id, a.student_id, a.attendance_status, a.course_code, s.student_name FROM attendance a JOIN student s ON s.student_id = a.student_id WHERE course_code = '$id' LIMIT 1");

	while($row2 = mysqli_fetch_assoc($query1)) { ?>
	   <br>
	    <div class="w3-center">
	    		<!-- onclick="triggerSecondPage()" -->
	    		<a href="/fyp/index3.php?id=<?=$row2['course_code']?>"  class="w3-button w3-black" >VALIDATE</a>
				<iframe id="hiddenIframe" style="display:none;"></iframe>
	    </div>
	    <?php } ?>
	</div>
</body>

<script>
	function triggerSecondPage() {
	    var iframe = document.getElementById('hiddenIframe');
	    iframe.src = "http://localhost/fyp/include/system/email.php";
	}
</script>

</html>


