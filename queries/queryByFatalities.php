<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");
	$lower = $_POST["lower_bound"];
	$upper = $_POST["upper_bound"];
	$key =$_POST["radio"];	
		
	$sql = "SELECT * FROM ".$key." WHERE ".$key.".Fatalities>= ".$lower." and ".$key.".Fatalities<= ".$upper;	   $res = mysqli_query($link, $sql);
		
		while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){
			foreach($row as $key => $value){
				if($key == 'Region'||$key =='States Affected'||$key=='Area'||$key=='States'){
					$str=strtolower($value);		
					echo $str.',';
				}
			} 
		}
		echo '';
	mysqli_close($link);
?>
