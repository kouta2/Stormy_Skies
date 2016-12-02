<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");


	$date = $_POST['date'];
	$queries = array();
	foreach($_POST as $key => $value){
		if($key!='date'){
			if($value == 'on'){
				$queries[]= "SELECT * FROM ".$key." WHERE ".$key.'.Date = "'.$date.'"';
			}
		}
	}
	$tables = array();
	foreach($queries as $query) {
		$tables[]=mysqli_query($link,$query);
	}
	//echo "<div class = "row">TEST</h1>";
	//echo "<div class = "col-md-1"></div>";
	//echo "<div class = "col-md-10">";
	foreach($tables as $res){
		while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){

			foreach($row as $key => $value){
			//echo "<div class = ".'"col-md-1"'.">".$key."</div>";
				if($key == 'Region'||$key =='States Affected'||$key=='Area'||$key=='States'){
				// $states = explode(',',$value);
					$str = strtolower($value);
					echo $str;
				// foreach($states as $state){ 
					// $state = strtolower($state);
					// echo $state;
				}
			}
		}
	}	
		echo "~"; // delimiter between daily weather and severe weather
	// sending daily weather data
	
	// end of sending daily weather data
		
	//echo "</div>"; //close the middle column


	//echo "</div>"; //close the big row
	//echo "</div>"
	//echo "<div class = "col-md-1"></div>"; 


	//echo "</div>"; //close the big row
	mysqli_close($link);

	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");

	$date = str_replace("/", "-", $date);
	$sql_daily = "SELECT * FROM daily_data WHERE DATE = '$date'";
	$daily_weather_res = mysqli_query($link, $sql_daily);

	while($row = mysqli_fetch_array($daily_weather_res, MYSQL_ASSOC)){
		foreach($row as $key => $value) {
			$str_value = (string)$value;
			if($key == 'DLY_TMIN_NORMAL') {
				echo strtolower($str_value);
			}
			else {
				echo strtolower($str_value).","; // delimiter between columns
			}
		}
		echo ";"; // delimiter between rows
	}
	
	mysqli_close($link);
?>
