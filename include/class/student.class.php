<?php

	class student{

		public $con;

		function set_name($con) {
			$this->con = $con;
		}

		function student_list(){
			$sql = "SELECT 
						*
					FROM 
						registration r
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
			return $row;
		}

		function student_selected($data){
			$sql = "SELECT 
						r.student_id,
						r.course_code,
						r.prog_code,
						r.regis_group,
						s.student_name,
						s.student_part,
						s.student_img 
					FROM 
						registration r 
					JOIN 
						student s ON r.student_id = s.student_id
					WHERE 
						r.student_id = '$data'
					";

			$result = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}



	}
?>
