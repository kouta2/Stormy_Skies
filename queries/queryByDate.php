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
	//echo "<div class = "row">TEST</h1>";
	//echo "<div class = "col-md-1"></div>";
	//echo "<div class = "col-md-10">";
	echo "<div class = ".'"row"'.">";


	echo "<div class = ".'"col-md-12"'.">";

	while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){
		
		echo "<div class = ".'"row"'.">";

		foreach($row as $key => $value){
			echo "<div class = ".'"col-md-1"'.">".$value."</div>";
		}
		echo "</div>"; //close the row
			
	}

	echo "</div>"; //close the middle column


	echo "</div>"; //close the big row
	//echo "</div>"
	//echo "<div class = "col-md-1"></div>"; 


	//echo "</div>"; //close the big row
	mysqli_close($link);
?>
