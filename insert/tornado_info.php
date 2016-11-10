<?php
	include_once("db.php");
	$name = $_POST['Name'];
        $date = $_POST['Date'];
        $states_affected = $_POST['States_Affected'];
        $num_tornadoes = $_POST['#_of_tornadoes'];
        $fatalities = $_POST['Fatalities'];

	$sql = "INSERT INTO tornadoes VALUES ('$name','$date','$states_affected','$num_tornadoes','$fatalities')";

	if(mysqli_query($link, $sql))  // mysql_query("INSERT INTO fires VALUES ('$data', $size, '$name', '$area')"))
                echo "success!";
        else
                echo "FAILED!!!";
        mysqli_close($link);
?>
