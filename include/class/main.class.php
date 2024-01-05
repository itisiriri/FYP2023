<?php
	class main{
		public $con;

		function set_name($con) {
			$this->con = $con;
		}

		function page($module=array(),$page,$value=array()){
			if (is_array($module)) {
				$nextModule='';
				$indicator=0;
				foreach ($module as $row) {
					if ($indicator>0) {
						$nextModule.="%2F";
					}
					$nextModule.=$row;
					$indicator++;
				}
			}else{
				$nextModule=$module;
			}
			if (is_array($value)) {
				$data='';
				foreach ($value as $row) {
					$data.="&data[]=".$row;
				}
			}else{
				$data="&data=".$value;
			}
			return "/fyp/main/?module=".$nextModule."&page=".$page.$data;
		}
		function blank_page($module=array(),$page,$value=array()){
			if (is_array($module)) {
				$nextModule='';
				$indicator=0;
				foreach ($module as $row) {
					if ($indicator>0) {
						$nextModule.="%2F";
					}
					$nextModule.=$row;
					$indicator++;
				}
			}else{
				$nextModule=$module;
			}
			if (is_array($value)) {
				$data='';
				foreach ($value as $row) {
					$data.="&data[]=".$row;
				}
			}else{
				$data="&data=".$value;
			}
			return "/fyp/main/blank.php?module=".$nextModule."&page=".$page.$data;
		}
	}
?>