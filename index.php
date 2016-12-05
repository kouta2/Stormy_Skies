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
	    <link href="css/bootstrap.min.css" rel="stylesheet"> 
	    <link href="css/styles.css" rel = "stylesheet">  
	    <link href="img/header.png" rel = "icon" >
  	</head>

  	<body style="background-image: url(img/background.jpg); color: white;">

		<nav style = "border-style: none;" class="navbar navbar-default navbar-custom">
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
		        

		        <li><a style = "color:white" href="queries/query_date.php" class = "active" >Queries</a></li>
		        <li><a style = "color:white" href="predictions/predictions.php">Playback</a></li>
		        
		        
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

			<div class = "col-md-3">

				<a href="http://www.accuweather.com/en/us/new-york-ny/10007/weather-forecast/349727" class="aw-widget-legal">

				</a><div id="awcc1480810357818" class="aw-widget-current"  data-locationkey="" data-unit="f" data-language="en-us" data-useip="true" data-uid="awcc1480810357818"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
			</div>


			<div class = "col-md-9">
				<div class = "row">
					<div class = "col-md-8">

					<div>
							
						<!-- div to hold the page title/subtitle/description/etc -->
						<div class = "header">

							<div class = "page-header">
								<h2 style = "text-align: center;vertical-align: middle;">Welcome to Stormy Skies!</h2>
								<h3 style = "text-align: center;vertical-align: middle;">With 65 years of weather data we've got everything you need.</h3>

							</div>




						</div>	
						

							
						

						<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  
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
							<div style = "text-align: center;vertical-align: middle;">
								<a href= "https://youtu.be/LybR9j3SECY"><button   class = "btn btn-danger"> Go! </button></a>
							</div>
						</div>	
						


					</div>
					</div>

					<div class = "col-md-4">

					<h4> 
						Here at Stormy Skies you can scan through decades worth of daily and severe weather information. 
					</h4>

					<h4>You can search by date, weather type, fatalities, and more!</h4>  


					<h4> You can see all your data displayed on a map of the U.S! </h4>

					<h4> Use our playback feature to see a year of temperature data right before your eyes! </h4>

					</div>
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
