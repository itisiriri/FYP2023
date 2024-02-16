<!DOCTYPE html>
<html>

<head>
    <title>Debugging index.php</title>
</head>

<body>

    <?php

$id = "2022937613";

    // Display contents of $_GET superglobal array for debugging
    echo "<pre>";
    print_r($id);
    echo "</pre>";

    // Check if $_GET['data'] is set
    if (isset($id)) {
        // Include necessary files
        include "include/system/dbConnection.php";
        include "include/class/class.php";
        include "include/system/head.php";

        // Check if student_id is set in $_GET['data']
        $studentDetail = $student->student_selected($id);
        if (isset($studentDetail['student_id']) && $studentDetail['student_id'] == $id) {
            // Include content.php and timetable listing
            include "include/system/content.php";
            include "include/module/timetable/listing.php";
        } else {
            // Include non-content.php
            include "include/system/non-content.php";
        }

        // Include footer.php
        include "include/system/footer.php";
    } else {
        // Display an error message if $_GET['data'] is not set
        echo "Error: Missing data parameter.";
    }
    ?>
