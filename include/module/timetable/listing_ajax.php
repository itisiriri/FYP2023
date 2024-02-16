<?php
	$timetableList = $timetable->timetable_list();
	$data = array();
	foreach ($timetableList as $key => $row) {
		$data[$key][0]=$key+1;
		$data[$key][1]=$row['course_code'];
		$data[$key][2]=$row['exam_date'];
		$data[$key][3]=$row['exam_time1'];
		$data[$key][4]=$row['exam_time2'];

	}
	$fullData = array("data"=>$data);
	echo json_encode($fullData);
?>
