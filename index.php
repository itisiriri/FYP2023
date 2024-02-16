<!DOCTYPE html>
<html>

<body>

    <?php
    var_dump($_GET);

    error_reporting(E_ERROR | E_PARSE);    

    $id = "2022937613";

    if (isset($id)) {
        // Include necessary files
        include "include/system/dbConnection.php";
        include "include/class/class.php";
        include "include/system/head.php";

        $studentDetail = $student->student_selected($id);
        if (isset($studentDetail['student_id']) && $studentDetail['student_id'] == $id) {
            // Include content.php and timetable listing
            include "include/system/content.php";
            include "include/module/timetable/listing.php";
        } else {
            // Include non-content.php
            include "include/system/non-content.php";
        }

        include "include/system/footer.php";
    } else {
        echo "Error: Missing data parameter.";
    }
    ?>

</body>

</html>
