<?php

include "include/system/dbConnection.php";
        include "include/class/class.php";

$host = 'localhost';
$port = 3307;
$username = 'root';
$password = '';
$dbname = 'fyp';

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$genList = $attendance -> attendance_gen('ITT640');

// Your SQL query
$sql = "SELECT DISTINCT a.attendance_id, a.student_id, a.prog_code, a.course_code, a.regis_group, a.attendance_status, a.student_part, s.student_name, l.lecturer_id, l.lecturer_name FROM attendance a JOIN student s ON s.student_id = a.student_id JOIN lecturer l ON a.regis_group = l.regis_group WHERE a.course_code = 'ITT640'";
$result = $conn->query($sql);

// Create an array to store the lecturer names
$lecturerNames = array();

// Print array data
echo "Array Data: ";
while($row = $result->fetch_assoc()) {
    // Check if the lecturer name is already in the array
    if (!in_array($row["lecturer_name"], $lecturerNames)) {
        // If not, add the lecturer name to the array and display it
        $lecturerNames[] = $row["lecturer_name"];?>
        <input type="text" name="item_name_<?php echo $count;?>" id="item_name_<?php echo $count;?>" value="<?php echo $row['lecturer_name'];?>" class="form-control" readonly>
    <?php }
}

// Close connection

$conn->close();

?>
<button type="button">
                <a href="http://localhost/fyp/next_page.php">Validate</a>
            </button>