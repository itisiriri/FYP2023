<?php

	header('Content-Disposition: attachment; filename="diesel report.csv"');

	$data['from']=$_GET['from'];
	$data['to']=$_GET['to'];
	$data['by']=$_GET['by'];

	$result_q=mysqli_query($con,$query);
	$row_q=mysqli_fetch_assoc($result_q);
	$entryname=$row_q['user_username'];

		$data[$i]=$row['diesel_date'].','.$row['diesel_from_issue'].','.$row['diesel_balanceBF'].','.$row['diesel_refno'].','.$row['diesel_receive'].','.$row['diesel_issued'].','.$row['diesel_balance'].',';
		$i++;
	
	$fp = fopen('php://output', 'wb');

	foreach ( $data as $ind => $line ) {
		$val = explode(",", $line);
		fputcsv($fp, $val);
	}
	fclose($fp);
	// echo "<script>window.close();</script>";
?>
