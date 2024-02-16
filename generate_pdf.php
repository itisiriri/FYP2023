<?php
	

include '/var/www/FYP2023.com/include/system/dbConnection.php';
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$json_data = $_GET['data'];
$data = json_decode($json_data, true);

$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM lecturer WHERE lecturer_id='$id'");
$user = mysqli_fetch_assoc($sql);

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('pdf_details.php');
$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print-details.pdf',['Attachment'=>false]);

?>


