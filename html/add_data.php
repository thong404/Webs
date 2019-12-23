<?php
	include ("connect.php");
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date = date('Y-m-d H:i:s', time());
	echo $date;
	$SQL1 = "INSERT INTO node1 (time_data,temp, lux, humi, shumi) VALUES ('$date','".$_GET["temp1"]."','".$_GET["lux1"]."','".$_GET["humi1"]."','".$_GET["shumi1"]."')";
	$SQL2 = "INSERT INTO node2 (time_data,temp, lux, humi, shumi) VALUES ('$date','".$_GET["temp2"]."','".$_GET["lux2"]."','".$_GET["humi2"]."','".$_GET["shumi2"]."')";
	$SQL3 = "INSERT INTO node3 (time_data,temp, lux, humi, shumi) VALUES ('$date','".$_GET["temp3"]."','".$_GET["lux3"]."','".$_GET["humi3"]."','".$_GET["shumi3"]."')";
	$SQL4 = "INSERT INTO node4 (time_data,temp, lux, humi, shumi) VALUES ('$date','".$_GET["temp4"]."','".$_GET["lux4"]."','".$_GET["humi4"]."','".$_GET["shumi4"]."')";
	
	mysqli_query($con, $SQL1);
	mysqli_query($con, $SQL2);
	mysqli_query($con, $SQL3);
	mysqli_query($con, $SQL4);
?>


