<?php
	$dir	= $_SERVER['DOCUMENT_ROOT'].'/var/www/FYP2023.com/include/class/';
	$files	= scandir($dir);

	foreach ($files as $row) {
		if ($row!='.' && $row!='..' && $row!='class.php') {
			include $dir.$row;
			$newClass = str_replace('.class.php', '', $row);
			${$newClass} = new $newClass();
			${$newClass}->set_name($conn);
		}
	}
?>
