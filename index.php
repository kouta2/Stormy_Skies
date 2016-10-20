<!DOCTYPE html>
<html lang="en">  
	
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Simple Database sdfaf</title>
 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    
  </head>

  <body>
    <h1>Ashwin is lame!<-- Is this because I wasn't here? T_T</h1>
    <h2> Testing testing one two three </h2>
   
    <?php
    	
    	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "parker_database");

		if (!$link) {
		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "<strong>" + "Debugging errno: " . mysqli_connect_errno() . PHP_EOL + "</strong>";
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		echo "<strong> Success: A proper connection to MySQL was made! Parker's database is great. </strong>" . PHP_EOL;
		echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;


		$sql = "SELECT * FROM Classes";
		$result = $link->query($sql);


		if ($result->num_rows > 0) {
			echo "<ul>";
    	// output data of each row
   			while($row = $result->fetch_assoc()) {
        		echo "<li> Name: " .$row["Name"] . "</li>";

        		
    		}
    		echo "</ul>";
		} else {
    		echo "0 results";
		}



		mysqli_close($link);
	?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
