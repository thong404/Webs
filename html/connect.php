<?php 
	$con = mysqli_connect("localhost","thong7991","raspberry","second_db");
    mysqli_connect("localhost", "thong7991","raspberry") or die(mysql_error());
    mysqli_select_db($con,"second_db") or die("Cannot connect to database");
?> 