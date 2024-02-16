

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Details Pdf</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        @media print {
            h1 {
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

<div class='jumbotron'>
    <h2> Attendance List </h2>
</div>

<div class='container'>
<?php $count = 1;
foreach ($courses as $regis_group => $prog_codes) { 
    foreach ($prog_codes as $prog_code => $student_parts) {
        foreach ($student_parts as $student_part => $attendance) { ?>
        <h3><?php echo htmlspecialchars($prog_code . " - " . $student_part . $regis_group) ?></h3>
        <table class="table table-striped">
          <thead class='thead-dark'>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Student ID</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($attendance as $row) { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?=$row['student_id']?></td>
                    <td><?=$row['student_name']?></td>
                    <?php if($row['attendance_status'] == 1) { ?>
                        <td>Present</td>
                    <?php } if($row['attendance_status'] == 0){ ?>
                        <td>Absent</td>
                    <?php }?>
                </tr>
            <?php $count++; } ?>
          </tbody>
        </table>
        <br>
    <?php $count = 1; } } }  ?>
</div>
</body>
</html>
