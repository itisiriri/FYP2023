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
        echo 'hello';
        include "include/system/dbConnection.php";
        include "include/class/class.php";
        include "include/system/head.php";

            include "include/system/content.php";

        // Include footer.php
        include "include/system/footer.php";
    } else {
        // Display an error message if $_GET['data'] is not set
        echo "Error: Missing data parameter.";
    }
    ?>

</body>

</html>
