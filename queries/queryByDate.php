<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");

	$severe_weather_selected = False;
	$date2 = $_POST['date'];
	$date_obj = date_create($date2);
	$date = date_format($date_obj, "n/j/Y");
	$queries = array();
	$type_of_severe = array();
	foreach($_POST as $key => $value){
		if($key!='date'){
			if($value == 'on'){
				$severe_weather_selected = True;
				$queries[]= "SELECT * FROM ".$key." WHERE ".$key.'.Date = "'.$date.'"';
				$type_of_severe[]= $key;
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
	$i = 0;
	$received_severe_data = False;
	foreach($tables as $res){
		while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){
			$sev_weth = $type_of_severe[$i];
			echo $sev_weth."!";
			foreach($row as $key => $value){
			//echo "<div class = ".'"col-md-1"'.">".$key."</div>";
				$str_value = strtolower($value);
				if(($type_of_severe[i] == "tornadoes" && $key == "Fatalities") || ($type_of_severe[i] == "hurricanes" && $key == "States Affected") || ($type_of_severe[i] == "earthquakes" && $key == "Fatalities") || ($type_of_severe[i] == "fires" && $key == "Area"))
				{
					echo $str_value;
				} 
				else 
				{
					echo $str_value."!"; // delimiter between columns
				}
				$received_severe_data = True;
				// if($key == 'Region'||$key =='States Affected'||$key=='Area'||$key=='States'){
				// $states = explode(',',$value);
				// $str = strtolower($value);
				// echo $str;
				// foreach($states as $state){ 
					// $state = strtolower($state);
					// echo $state;
			}
			echo ";";
		}
		$i++;
	}
// }	
	echo "~"; // delimiter between daily weather and severe weather
	// sending daily weather data
	
	// end of sending daily weather data
		
	//echo "</div>"; //close the middle column


	//echo "</div>"; //close the big row
	//echo "</div>"
	//echo "<div class = "col-md-1"></div>"; 


	//echo "</div>"; //close the big row
	mysqli_close($link);

	if($severe_weather_selected == True && $received_severe_data == False)
	{
		echo "Sorry your results could not be found";
	}
	else {

	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");

	$date = str_replace("/", "-", $date);
	$sql_daily = "SELECT * FROM daily_data WHERE DATE = '$date'";
	$daily_weather_res = mysqli_query($link, $sql_daily);

	while($row = mysqli_fetch_array($daily_weather_res, MYSQL_ASSOC)){

		foreach($row as $key => $value) 
		{
			$str_value = (string)$value;
			if($key == 'DLY_TMIN_NORMAL') 
			{
				echo strtolower($str_value);
			}
			else 
			{
				echo strtolower($str_value).","; // delimiter between columns
			}
		}
		echo ";"; // delimiter between rows
	}
	
	mysqli_close($link);
	}
?>
