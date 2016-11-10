<?php
	# include_once('db.php');
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");	
	$date = $_POST['date'];
	$size = $_POST['size'];
	$name = $_POST['name'];
	$area = $_POST['area'];

	$sql = "INSERT INTO fires VALUES ('$date', $size, '$name', '$area')";

	if(mysqli_query($link, $sql))  // mysql_query("INSERT INTO fires VALUES ('$data', $size, '$name', '$area')"))
		echo "success!";
	else
		echo "FAILED!!!";
	mysqli_close($link);
	
?>
