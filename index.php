riri
riwlla
Invisible

riri — Today at 10:08 PM
https://github.com/itisiriri/FYP2023.git
GitHub
GitHub - itisiriri/FYP2023
Contribute to itisiriri/FYP2023 development by creating an account on GitHub.
extro — Today at 10:44 PM
sudo systemctl status mysql
<!DOCTYPE html> <html>  <head>     <title>Debugging index.php</title> </head>  <body>      <?php     error_reporting(E_ERROR | E_PARSE);      //Check if $_GET['data'] is set     if (isset($_GET['data'])) {         // Include necessary files         include "include/system/dbConnection.php";         include "include/class/class.php";         include "include/system/head.php";          // Check if student_id is set in $_GET['data']         $studentDetail = $student->student_selected($_GET['data']);         if (isset($studentDetail['student_id']) && $studentDetail['student_id'] == $_GET['data']) {             // Include content.php and timetable listing             include "include/system/content.php";             include "include/module/timetable/listing.php";         } else {             // Include non-content.php             include "include/system/non-content.php";         }          // Include footer.php         include "include/system/footer.php";     } else {         // Display an
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
﻿
extro
extro2210
I'm Back -24/4/2024
