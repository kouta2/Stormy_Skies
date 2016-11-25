<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");
	$lower = $_POST["lower_bound"];
	$upper = $_POST["upper_bound"];
	$t = $_POST["tornadoes"];
	$h = $_POST["hurricanes"];
	$e = $_POST["earthquakes"];
	
	foreach($_POST as $key => $value){
		if($key!='upper_bound'&&$key!='lower_bound'){
			if($value == 'on'){
				echo '<br>'.'---------'.$key.'---------'.'<br>';
				$sql = "SELECT * FROM ".$key." WHERE ".$key.".Fatalities>= ".$lower." and ".$key.".Fatalities<= ".$upper;
				
				$res = mysqli_query($link, $sql);
				echo "<table>";
				while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){
					echo "<tr>";
					foreach($row as $key => $value){
						echo "<td>".$value."</td>";
					}
					echo "</tr>";	
				}
				echo "</table>";
			}
		}
	}
	mysqli_close($link);
?>
