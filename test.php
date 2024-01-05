<!DOCTYPE html>
<html>
    
    <?php
        // error_reporting(E_ERROR | E_PARSE);
        include "include/system/dbConnection.php";
        include "include/class/class.php";

        $course = 'ITT640';
        $genList = $attendance -> attendance_gen($course);
    ?>

    <style>

        .container {
            display: flex;
            align-items: left;
            justify-content: left;
        }

    </style>

    <head>

        <title>ATTENDANCE LIST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>

        <?php
            $array = array();
            $query = $attendance -> attendance_gen($course);
            $result = mysqli_query($query);

            while($row = mysqli_fetch_array($result)){
                $array[] = $rowO['student_id'];
        ?>

        <div class="container w3-margin-top">
            <div style="margin-left: 20px; margin-top: 20px; margin-right: 20px;">
                <img src="/fyp/include/images/LogoUiTM2.png" style="height:90px;width:90px" alt="Avatar">
            </div>

            <div style="margin-top: 30px;">
                <p class="w3-medium" style="padding: 0px; margin: 0px;">UNIVERSITI TEKNOLOGI MARA.</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">BAHAGIAN HAL EHWAL AKADEMIK,</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">40450 SHAH ALAM, SELANGOR DARUL EHSAN.</p>
            </div>
        </div>

        <div class="container w3-margin-top">
            <div class="w3-padding-large">
                <p class="w3-small" style="padding: 0px; margin: 0px;">COURSE</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">PROGRAMME</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">GROUP</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">LECTURER</p>
            </div>

            <div class="w3-padding-large">
                <p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
                <p class="w3-small" style="padding: 0px; margin: 0px;">:</p>
            </div>

            <div class="w3-padding-large" style="margin-bottom: 20px;">
                <p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;"><?php echo $course;?></p>
                <p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;"><?php echo $rowO['prog_code'];?></p>
                <p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;"><?php echo $rowO['student_part'] . $rowO['regis_group'] ;?></p>
                <p class="w3-small" style="padding: 0px; margin: 0px; font-weight: bold;"><?php echo $rowO['lecturer_name'];?></p>
            </div>
        </div>

        <div class="w3-container">

            <table class="w3-table w3-bordered">
                <tr>
                    <th>No.</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                <?php 
                    foreach($genList as $rowT){
                        $counter = 1;
                ?>
                <tr>
                    <td><?php echo $counter++;?></td>
                    <td><?php echo $rowT['student_id'];?></td>
                    <td><?php echo $rowT['student_name'];?></td>
                    <td><?php 
                            if ($rowT['attendance_status'] == 1){ ?> 
                                <i class="fa fa-check"></i> 
                            <?php } if ($rowT['attendance_status'] == 0){ ?>
                                <i class="fa fa-close"></i> 
                        <?php } ?>
                    </td>
                </tr>
                <?php 
                    }   
                ?>
            </table>
        </div>
        <?php 
            }   
        ?>
    </body>

</html>
