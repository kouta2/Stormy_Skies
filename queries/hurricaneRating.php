<?php
	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");
	$lower = $_POST["lower"];
	$upper = $_POST["upper"];

	$sql = "SELECT * FROM hurricanes as h WHERE h.Category>=$lower and h.Category<=$upper ORDER BY h.Category DESC";
	$res = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($res,MYSQL_ASSOC);
	echo '<div class ="text-center"> <fieldset><legend><strong style="color:white;">Hurricanes</strong> </legend> </fieldset></div>';
	echo "<div class = ".'"table.responsive">';
	echo "<table class = ".'"table">';
	echo "<thead>";
	echo "<tr>";
	foreach($row as $key=>$value){
		echo "<th>".$key."</th>";
	}
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){
        	echo "<tr>";
		//echo "<div class = ".'"row"'.">";
                foreach($row as $key => $value){
                	echo "<td>".$value."</td>";
			//echo "<div class = ".'"col-md-1"'.">".$value."</div>";
                }
                echo "</tr>";
       	}
	echo "</tbody>";	
	echo "</table";
	mysqli_close($link);
?> 
