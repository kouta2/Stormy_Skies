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
	    <link href="css/styles.css" rel = "stylesheet">  
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
		        

		        <li><a href="queries/query_date.php" class = "active" >Queries</a></li>
		        <li><a href="predictions/predictions.php">Predictions</a></li>
		        <li><a href="map/map.php">Map</a></li>
		        
		      </ul>

		     
		      
		      <ul class="nav navbar-nav navbar-right">
		      	<li>
		      	  	<p class="navbar-btn">
                    	<a href="insert/insert_daily.php" class="btn btn-success">Add Data</a>
                	</p>
                </li>
		        
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav> 	

		<div class = "row">

			<div class = "col-md-2"></div>

			<div class = "col-md-8">
				<div class = "jumbotron">
						
					<!-- div to hold the page title/subtitle/description/etc -->
					<div class = "header">

						<div class = "page-header">
							<h2 style = "text-align: center;vertical-align: middle;">Wecome to Stormy Skies</h2>
							<h3 style = "text-align: center;vertical-align: middle;">With 65 years of weather data we've got everything you need.</h3>

						</div>




					</div>	
					

						
					

					<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
					  

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					      <img src="img/cloudy.jpg" alt="Chania" width = "800px" height="600px" style = "margin:0 auto;">
					    </div>

					    <div class="item">
					      <img src="img/hurricane.jpg" alt="Chania" width = "800px" height="600px" style = "margin:0 auto;">
					    </div>

					    <div class="item">
					      <img src="img/lightning.jpg" alt="Chania" width = "800px" height="600px" style = "margin:0 auto;">
					    </div>

					    <div class="item">
					      <img src="img/tornado.jpg" alt="Chania" width = "800px" height="600px" style = "margin:0 auto;">
					    </div>
					  </div>

					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>	

					<!-- div to hold the jumbotron footer -->
					<div class = "footer">
						<h3 style = "text-align: center;vertical-align: middle;"> Check us out on YouTube! </h3>
						<div style = "text-align: center;vertical-align: middle;"><button  class = "btn btn-danger"> Go! </button></div>

					</div>	
					


				</div>

			</div>

			<div class = "col-md-2"></div>
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
