<?php
	include_once("db.php");
	$date = $_POST['Date'];
	$states_affected = $_POST["States_Affected"];
	$magnitude = $_POST['Magnitude'];
	$fatalities = $_POST['Fatalities'];

	$sql = "INSERT INTO earthquakes VALUES ('$date','$states_affected','$magnitude','$fatalities')";

	if(mysqli_query($link, $sql))  // mysql_query("INSERT INTO fires VALUES ('$data', $size, '$name', '$area')"))
                echo "success!";
        else
                echo "FAILED!!!";
        mysqli_close($link);
?>
