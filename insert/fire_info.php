<?php
	include_once("db.php");
	$name = $_POST['Name'];
	$date = $_POST['Date'];
	$size = $_POST['Size'];
        $states_affected = $_POST['States_Affected'];

	$sql = "INSERT INTO fires VALUES ('$date','$size','$name','$states_affected')";

	if(mysqli_query($link, $sql))  // mysql_query("INSERT INTO fires VALUES ('$data', $size, '$name', '$area')"))
                echo "success!";
        else
                echo "FAILED!!!";
        mysqli_close($link);
?>
