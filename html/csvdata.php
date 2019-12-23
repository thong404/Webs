<?php 
    $con = mysqli_connect("localhost","root","vertrigo","second_db");
    mysqli_connect("localhost", "root","vertrigo") or die(mysql_error());
    mysqli_select_db($con,"second_db") or die("Cannot connect to database");
    $file = fopen("test.csv", "r");
    $data = fgetcsv($file);
    
    while (($data = fgetcsv($file, 10000, ",")) !== FALSE)
    {

        $sql = "INSERT INTO data (time_data, temp, lux, humi, shumi) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]') ";
        mysqli_query($con, $sql);
    }
      fclose($file);
?>