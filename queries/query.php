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
	    <link href="css/fuck.css" rel = "stylesheet">  

  	</head>

  	<body>

		<nav class="navbar navbar-default navbar-custom">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		        <a class="navbar-brand" href="index.php"> 
		        	<img src="img/bolt.png"  width=32 height=32>
		        </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        

		        <li><a href="query.php" class = "active" >Queries</a></li>
		        <li><a href="arv_map.php">Minor Weather</a></li>
		        <li><a href="shw_map.php">Predictions</a></li>
		        <li><a href="map.php">Map</a></li>
		        
		      </ul>

		     
		      
		      <ul class="nav navbar-nav navbar-right">
		        <li>
		        	<a href="insert/insert.php">
		        	<button type="button" class="btn btn-success navbar-btn">Add Data</button>
		        	</a>
		        </li>
		        
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav> 	

		<div class = "query_body">
			<div class = "row">

				<div class = "col-md-3 criteria_sidebar">
					<h4>Search Criteria </h4>

					<label class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Criteria 1</span>
					</label>

					<label class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Criteria 1</span>
					</label>


					<label class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Criteria 1</span>
					</label>

					<label class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Criteria 1</span>
					</label>


				</div>

				<div class = "col-md-9 results_panel">
					<h4>Results </h4>

				</div>
			</div>
		</div>   
   

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
