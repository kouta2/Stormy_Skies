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
	    <title>Stormy Skies</title> 
	    <!-- Bootstrap -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
	    <link href="../css/styles.css" rel = "stylesheet">  
  	</head>

  	<body>

		<nav class="navbar navbar-default navbar-custom">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		        <a class="navbar-brand" href="../index.php"> 
		        	<img src="../img/bolt.png"  width=32 height=32>
		        </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        

		        <li><a href="../queries/query_date.php" class = "active" >Queries</a></li>
		        <li><a href="../predictions/predictions.php">Predictions</a></li>
		        <li><a href="../map/map.php">Map</a></li>
		        
		      </ul>

		     
		      
		      <ul class="nav navbar-nav navbar-right">
		        <li><button type="button" class="btn btn-success navbar-btn">Add Data</button></li>
		        
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav> 	


		<div class="query_body">

			<ul class="nav nav-tabs">
			 	<li role="presentation" class="active"><a href="insert_daily.php">Daily Weather</a></li>
			  	<li role="presentation"><a href="insert_hurricane.php">Hurricanes</a></li>
			  	<li role="presentation"><a href="insert_tornado.php">Tornados</a></li>
			  	<li role="presentation"><a href="insert_earthquake.php">Earthquakes</a></li>
			  	<li role="presentation"><a href="insert_fire.php">Fires</a></li>
			  	<li role="presentation"><a href="insert_volcano.php">Volcanos</a></li>
			</ul>

			<div class = "row insert_criteria">

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Station</span>
					 	<input id="Station" type="text" class="form-control" placeholder="">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Station Name</span>
					 	<input id="Station Name" type="text" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Date</span>
					 	<input id="Date" type="text" class="form-control" id="basic-url" placeholder="mm/dd/yyyy">
					</div>
				</div>
				

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Min Temp</span>
					 	<input id="Min Temp" type="text" class="form-control" id="basic-url" placeholder="in F°">
					</div>
				</div>


				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Max Temp</span>
					 	<input id="Max Temp" type="text" class="form-control" id="basic-url" placeholder="in F°">
					</div>
				</div>

			</div>
			<div class = "row insert_criteria">
				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Rain</span>
					 	<input id="Rain" type="text" class="form-control" id="basic-url" placeholder="in.">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Snowfall</span>
					 	<input id="Snowfall" type="text" class="form-control" id="basic-url" placeholder="in.">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Latitude</span>
					 	<input id="Latitude" type="text" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Longitude</span>
					 	<input id="Longitude" type="text" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Elevation</span>
					 	<input id="Elevation" type="text" class="form-control" id="basic-url" placeholder="meters">
					</div>
				</div>

				<div class = "col-md-2">
					<button onclick="readInputs()" type="button" class="btn btn-success">Submit</button>
				</div>

			</div>
		</div> <!--close query body-->
		
		<p id = "results">
		
		</p>

		<script>
		function readInputs() {
			var text = ""
			
			var x = document.getElementById("Station");
    			var station = x.value;
			x = document.getElementById("Station Name");
    			var station_name = x.value;
			x = document.getElementById("Date");
    			var dat = x.value;
			x = document.getElementById("Min Temp");
    			var min_temp = x.value;
			x = document.getElementById("Max Temp");
    			var max_temp = x.value;
			x = document.getElementById("Rain");
    			var rain = x.value;
			x = document.getElementById("Snowfall");
    			var snowfall = x.value;
			x = document.getElementById("Latitude");
    			var lat = x.value;
			x = document.getElementById("Longitude");
    			var lon = x.value;
			x = document.getElementById("Elevation");
    			var elevation = x.value;
			
			text = station + ", " + station_name + ", ";
    			document.getElementById("results").innerHTML = text;
		}
		</script>	


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
