<?php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Database connection
$host = 'localhost';
$db   = 'fyp';
$user = 'root';
$pass = '';
$port = 3307;
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Fetch data from database
$sql = "SELECT student.student_name, student.student_id, attendance.attendance_status FROM student
        JOIN attendance ON student.student_id = attendance.student_id
        WHERE attendance.student_id = :student_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['student_id ' => 1]); // Assuming class_id is 1
$data = $stmt->fetchAll();

// Create a HTML table for the data
$html = '<html><body><table border="1" style="width:100%">
<tr><th>Name</th><th>Reg No</th><th>Status</th></tr>';

foreach ($data as $row) {
    $html .= "<tr><td>{$row['student_name']}</td><td>{$row['regis_group']}</td><td>{$row['attendance_status']}</td></tr>";
}

$html .= '</table></body></html>';

// Generate the PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("class_attendance_list.pdf");