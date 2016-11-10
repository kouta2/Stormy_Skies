<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");
	$date = $_POST["date"];
	$t = $_POST["tornadoes"];
	$h = $_POST["hurricanes"];
	$e = $_POST["earthquakes"];
	$f = $_POST["fires"];
	$d = $_POST["daily"];

	$str ='';
	$first = TRUE;
	$prev = '';
	$top = '';
	foreach($_POST as $key => $value){
		if($key!='date'){
			if($value == 'on'){
				if($first===FALSE){
					$str.='INNER JOIN ';
					$str.=($key . ' ON '.$key.'.Date='.$prev.'.Date ');		
					$prev = $key;
				}
				else{
					$str.=($key.' ');
					$prev = $key;
					$first = FALSE;
					$top = $key;	
				}
			}
		}
	}
	$sql = "SELECT * FROM ".$str."WHERE ".$top.'.Date = "'.$date.'"';
	$res = mysqli_query($link, $sql);
	echo "<table>";
	while($row = mysqli_fetch_array($res)){
		echo "<tr>";
		foreach($row as $key => $value){
			echo "<td>".$value."</td>";
		}
			echo "</tr>";	
	}
	echo "</table>";
	mysqli_close($link);
?>
