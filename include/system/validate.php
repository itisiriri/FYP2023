<!DOCTYPE html>
<html>
	
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv=content-type content="text/html; charset=utf-8">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<title>Validate Attendance</title>

	</head>

	<body style="margin: 50px;">
		
		<h1>List of Students</h1> 
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Student ID</th>
					<th>Seat num</th>
					<th>Group</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$host = 'localhost';
					$port = 3307;
					$username = 'root';
					$password = '';
					$dbname = 'fyp';

					// Create a connection
					$conn = mysqli_connect($host, $username, $password, $dbname, $port);

					// Check the connection
					if (mysqli_connect_errno()) {
					    echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}

					$query = "SELECT
						a.attendance_id,
						a.student_id,
                        a.prog_code,
                        a.course_code,
                        a.regis_group,
                        a.attendance_status,
                        a.student_part,
                        s.student_name,
                        l.lecturer_id,
                        l.lecturer_name
					FROM
						attendance a
					JOIN 
						student s ON s.student_id = a.student_id
					JOIN 
						lecturer l ON a.regis_group = l.regis_group
					WHERE 
						a.course_code = 'ITT640'";

					$result = mysqli_query($conn, $query);

					while ($row = mysqli_fetch_assoc($result)) {
					    $array[$row['attendance_id']][$row['student_id']][$row['prog_code']][$row['course_code']][$row['regis_group']][$row['student_part']][$row['student_name']][$row['lecturer_id']][$row['lecturer_name']] = $row['attendance_status'];  
					    $array1[$row['lecturer_id']][$row['lecturer_name']] = $row['attendance_status'];    
					}

					mysqli_close($conn);

					$displayed_values1 = array();
					foreach ($array1 as $lecturer_id => $lecturer_data) {
					  	foreach ($lecturer_data as $lecturer_name => $lecturer_status) {
					        if (!in_array($lecturer_status, $displayed_values1)) { ?>
						                    
						        <p><?php echo $lecturer_name ?><p>

					        <?php $displayed_values1[] = $lecturer_status;
					    	}
					    }
					}


					$displayed_values = array();
					foreach ($array as $attendance_id => $attendance_data) {
						foreach ($attendance_data as $student_id => $student_data) {
							foreach ($student_data as $prog_code => $prog_data) {
								foreach ($prog_data as $course_code => $course_data) {
									foreach ($course_data as $regis_group => $regis_data) {
							            foreach ($regis_data as $student_part => $student_p) {
							            	foreach ($student_p as $student_name => $student_n) {
							            		foreach ($student_n as $lecturer_id => $lecturer_data) {
							            			foreach ($lecturer_data as $lecturer_name => $lecturer_n) {
										                if (!in_array($lecturer_n, $displayed_values)) { ?>

										                    <?php if($lecturer_n == 1){?>
															    <tr>
																	<td><?php echo $attendance_id ?></td>
																	<td><?php echo $student_id ?></td>
																	<td><?php echo $attendance_id ?></td>
																	<td><?php echo $regis_group ?></td>
																	<td>
																		<i class="fas fa-check"></i>
										  							</td>
																</tr>
															<?php } else{ ?>
																<tr>
																	<td><?php echo $attendance_id ?></td>
																	<td><?php echo $student_id ?></td>
																	<td><?php echo $attendance_id ?></td>
																	<td><?php echo $regis_group ?></td>
																	<td>
																		<i class="fas fa-times"></i>
										  							</td>
																</tr>
															<?php }

										                    $displayed_values[] = $lecturer_n;
										                }
										            }
						        				}
						    				}
						    			}
						    		}
						    	}
					        }
					    }
					}

					?>
			</tbody>
		</table>

		<div>
			<button type="button">
				<a href="http://localhost/fyp/include/system/stats.php">Validate</a>
			</button>
		</div>

	</body>
</html>