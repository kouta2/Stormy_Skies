<!DOCTYPE html>
<html lang="en">  
    <!--initial connection script -->
    <?php    	

    	$link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");		
	?>   
    
  	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Stormy Skies Stage 4</title> 
	    <!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet"> 
	    <link href="css/mine.css" rel = "stylesheet">  
  	</head>

  	<body>
  		
  		<ul class="nav nav-tabs" id = "nav_tabs">
			<li role="presentation"><a href="index.php">Home</a></li>
			<li role="presentation" class="active"><a href="minor.php">Minor Weather</a></li>
			<li role="presentation"><a href="major.php">Major Weather</a></li>
		</ul>



    
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  	<!-- closing db connection -->
    <?php

        mysqli_close($link);
    ?>
</html>
