<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");	
	$date = $_POST["date"];
	$tornadoes = $_POST["tornadoes"];
	$hurricanes = $_POST["hurricanes"];
	$earthquakes = $_POST["earthquakes"];
	$fires = $_POST["fires"];
	$daily = $_POST["daily"];
	for($_POST as $key=>$val)
	{
		if(isSet())
	}


	$sql = "SELECT * FROM tornadoes ";
	$res = mysqli_query($link, $sql);
	$result = array();
	while($row = mysqli_fetch_array($res))
	{
		array_push($result, array('Date'=>$row[0],
								  'Fatalities' => $row[1]
								  'Name' => $row[2]
								  'Region'=>$row[3]
								  'Tornadoes'=>$row[4]));
	}
	echo json_encode(array("result"=>$result));
	//mysqli_close($link);
?>