<?php
	include "dbConnection.php";

	$query = "SELECT * FROM attendance";
	$result = mysqli_query($conn, $query);

	// while($value = mysqli_fetch_assoc($result)){

	// 	echo $value['student_id'].$value['prog_code'];
	// }
?>

<html>
  	<head>
  		<title>ATTENDANCE SUMMARY</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv=content-type content="text/html; charset=utf-8">

		<style>

			html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

			#footer {
				position: fixed;
			    padding: 10px 10px 0px 10px;
			    bottom: 0;
			    width: 100%;
			    /* Height of the footer*/
			    height: 45px;
			}

		</style>

    	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
      	
	      	google.charts.load('current', {'packages':['corechart']});
	      	google.charts.setOnLoadCallback(drawChart);

	      	function drawChart() {

	        	var data = google.visualization.arrayToDataTable([
	          		['Task', 'Hours per Day'],
	          		<?php 

	          			while($chart = mysqli_fetch_assoc($result)){
	          				echo "['".$chart['student_id']."',".$chart['attendance_status']."],";
	          			}

	          		?>
	        	]);

		        var options = {
		          	title: 'Attendance Statistics'
		        };

	        	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

	        	chart.draw(data, options);
	     	}
    	</script>
  	</head>

  	<body>
    	<div id="piechart" style="width: 900px; height: 500px;"></div>
  	</body>
</html>