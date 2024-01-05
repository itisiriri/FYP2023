<?php

	class timetable{

		public $con;

		function set_name($con) {
			$this->con = $con;
		}

		function timetable_list(){
			$sql = "SELECT 
						*
					FROM 
						examination e
					ORDER BY
						e.exam_date ASC
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $row;
		}

		function timetable_current($data){
			$sql = "SELECT 
						e.exam_id,
						e.course_code,
						e.exam_date,
						e.exam_time1,
						e.exam_time2,
						s.seat_num,
						s.location_code 
					FROM 
						examination e 
					JOIN 
						registration r ON e.course_code = r.course_code
					JOIN
						seating s ON r.student_id = s.student_id
					WHERE
						r.student_id = '$data'
					AND 
						CAST(exam_date AS DATE) = CAST( curdate() AS DATE)
					AND 
						CURRENT_TIME 
					BETWEEN 
						exam_time1 AND exam_time2
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $row;

		}
	}
	
?>