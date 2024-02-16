<?php

	class attendance{

		public $con;

		function set_name($con) {
			$this->con = $con;
		}

		function attendance_list(){
			$sql = "SELECT 
						*
					FROM
						attendance
					ORDER BY
						student_id ASC
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $row;
		}

		function attendance_absentList($data){
			$sql = "SELECT 
						*
					FROM
						attendance a
					JOIN
						student s ON s.student_id = a.student_id
					WHERE
						attendance_status = '0'
					AND 
						course_code = '$data'
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $row;
		}

		function attendance_update($data){
			$sql = "UPDATE
						`attendance`
					SET
						attendance_status=?
					WHERE
						student_id=? 
					";

			$stmt = mysqli_prepare($this->con,$sql);
			$stmt -> bind_param(
							"si",
							$attendance_status,
							$student_id
						);

			$attendance_status='1';
			$student_id=$data;
			$stmt -> execute();
		}

		function attendance_sub(){
			$sql = "SELECT
						course_code,
						exam_date
					FROM
						examination
					WHERE
						exam_time2 > CURRENT_TIME + 60
					AND
						exam_date >= CURRENT_DATE - 1
					AND
						exam_date <= CURRENT_DATE - 1
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $row;
		}

		function attendance_gen($data){
			$sql = "SELECT
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
						a.course_code = '$data' 
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $row;
		}

		function attendance_val($data){
			$sql = "SELECT 
						a.attendance_id, a.student_id, a.attendance_status, s.student_name 
					FROM 
						attendance a 
					JOIN 
						student s ON s.student_id = a.student_id 
					WHERE 
						course_code = '$data'
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $row;
		}
	}
?>
