<?php
	include_once("db.php");
	$station = $_POST['Station'];
	$station_name = $_POST['Station_Name'];
	$date = $_POST['Date'];
	$min_temp = $_POST['Min_Temp'];
	$max_temp = $_POST['Max_Temp'];
	$avg_temp = $_POST['Avg_Temp'];
	$rain = $_POST['Rain'];
	$snowfall = $_POST['Snowfall'];
	$latitude = $_POST['Latitude'];
	$longitude = $_POST['Longitude'];
	$elevation = $_POST['Elevation'];

	$sql = "INSERT INTO daily_data VALUES ('$station', '$station_name','$elevation', '$latitude', '$longitude', '$date', '$rain', '$snowfall', '$max_temp', '$avg_temp', '$min_temp')";

	if(mysqli_query($link, $sql))  // mysql_query("INSERT INTO fires VALUES ('$data', $size, '$name', '$area')"))
                echo "success!";
        else
                echo "FAILED!!!";
        mysqli_close($link);
?>
