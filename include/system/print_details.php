<?php 
include('dbConnection.php');
require 'C:\xampp\htdocs\fyp\dompdf\autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['id'];

// Retrieve the attendance data from the database
$sql = "SELECT * FROM attendance a JOIN student s ON a.student_id = s.student_id WHERE course_code = '$id' ORDER BY a.regis_group, a.attendance_id";
$result = mysqli_query($conn, $sql);

// Loop through the attendance data and separate it into arrays based on course_code
$courses = [];
while ($row = mysqli_fetch_assoc($result)) {
  $regis_group = $row['regis_group'];
  $prog_code = $row['prog_code'];
  $student_part = $row['student_part'];
  if (!isset($courses[$regis_group])) {
    $courses[$regis_group] = [];
  }
  if (!isset($courses[$regis_group][$prog_code])) {
    $courses[$regis_group][$prog_code] = [];
  }
  if (!isset($courses[$regis_group][$prog_code])) {
    $courses[$regis_group][$prog_code][$student_part] = [];
  }
  $courses[$regis_group][$prog_code][$student_part][] = $row;
}

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('details_pdf.php');
$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print-details.pdf',['Attachment'=>false]);


