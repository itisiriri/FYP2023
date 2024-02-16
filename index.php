<!DOCTYPE html>
<html>

<head>
    <title>Debugging index.php</title>
</head>

<body>

    <?php
    error_reporting(E_ERROR | E_PARSE);

    //Check if $_GET['data'] is set
    if (isset($_GET['data'])) {
        // Include necessary files
        include "include/system/dbConnection.php";
        include "include/class/class.php";
        include "include/system/head.php";

        // Check if student_id is set in $_GET['data']
        $studentDetail = $student->student_selected($_GET['data']);
        if (isset($studentDetail['student_id']) && $studentDetail['student_id'] == $_GET['data']) {
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

</body>

</html>
