<?php
	include_once("db.php");
	$name = $_POST['Name'];
	$date = $_POST['Date'];
	$category = $_POST['Category'];
	$fatalities = $_POST['Fatalities'];
	$states_affected = $_POST['States_Affected'];

	$sql = "INSERT INTO hurricanes VALUES ('$name','$date','$category','$fatalities','$states_affected')";

	if(mysqli_query($link, $sql))  // mysql_query("INSERT INTO fires VALUES ('$data', $size, '$name', '$area')"))
                echo "success!";
        else
                echo "FAILED!!!";
        mysqli_close($link);
?>
