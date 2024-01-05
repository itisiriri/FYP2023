<?php
	
	require __DIR__ . "/vendor/autoload.php";
	include "include/system/dbConnection.php";
	include "include/class/class.php";

	use Dompdf\Dompdf;
	use Dompdf\Options;


	$options = new Options;
	$options -> setChroot(__DIR__);

	$dompdf = new Dompdf($options);

	$dompdf -> setPaper("A4", "portrait");

	$html = file_get_contents("test.php");
	$dompdf -> loadHtml($html);

	$dompdf -> render();

	$dompdf -> addInfo("Title", "Attendance");

	$dompdf -> stream("attendance.pdf", ["Attachment" => 0]);

?>