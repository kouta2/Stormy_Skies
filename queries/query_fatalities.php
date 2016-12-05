<!DOCTYPE html>
<html lang="en">     
  	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Stormy Skies</title> 
	    <!-- Bootstrap -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
	    <link href="../css/styles.css" rel = "stylesheet">  
 		 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwvDeUmfCVgrrUyU29pb_kWzjW600k3Ac&libraries=geometry"></script>
    		<script type="text/javascript" src="../map/us_borders_dict.js"></script>
		<script type="text/javascript" src="../info_box.js"></script>
	    <link href="../img/header.png" rel = "icon" >

	</head>

  	<body style="background-image: url(../img/background.jpg); color: white;">

		<nav style = "border-style: none;"class="navbar navbar-default navbar-custom">
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
		        

		        <li><a href="#" class = "active" style = "color:white;" >Queries</a></li>
		        <li><a href="../predictions/predictions.php" style = "color:white;">Playback</a></li>
		        
		        
		      </ul>

		     
		      
		      <ul class="nav navbar-nav navbar-right">
		      	<li>
		      	  	<p class="navbar-btn">
                    	<a href="../insert/insert_daily.php" class="btn btn-success">Add Data</a>
                	</p>
                </li>		        
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav> 	


		<div class="query_body">

			<ul class="nav nav-tabs">
			  	<li role="presentation"><a href="predictions.php" style = "color:white;">Annual</a></li>
			 	<li role="presentation"><a href="query_date.php" style = "color:white;">Date</a></li>
			  	<li role="presentation" class ="active"><a href="query_fatalities.php">Fatalities</a></li>
			  	<li role="presentation"><a href="query_rating.php" style = "color:white;">Rating</a></li>
			  	
			</ul>

			<form id = "fate_form" action = "queryByFatalities.php" method="post">
			
			<div class = "row insert_criteria">
				

				<div class = "col-md-2">
					<div class="input-group">
					  	<span class="input-group-addon">Fatalities (Lower)</span>
					 	<input type="text" class="form-control" name="lower_bound" placeholder="">
					</div>
				</div>

				<div class = "col-md-2">
					<div class="input-group" style="text-align: center;">
					  	<span class="input-group-addon">Fatalities(Upper)</span>
					 	<input type="text" class="form-control" name="upper_bound" placeholder="">
					</div>
				</div>


				<div class = "col-md-2">
					<div class="checkbox" style = "text-align: center;">
					   	<label>
					   		<input type="radio" name = "radio"value = "tornadoes"> Tornadoes
					   	</label>
					</div>
				</div>

				<div class = "col-md-2">
					<div class="checkbox" style = "text-align: center;">
					   	<label>
					   		<input type="radio" name = "radio"value = "hurricanes"> Hurricanes
					   	</label>
					</div>
				</div>

				<div class = "col-md-2">
					<div class="checkbox" style="text-align: center;">
					   	<label>
					   		<input type="radio" name = "radio" value = "earthquakes"> Earthquakes   
					   	</label>
					</div>
				</div>				

				<div class = "col-md-2">
					<button id="sub" type="submit" style = "width: 100%;"class="btn btn-success">Submit</button>
					<!--<button type = "button" id = "sub">Search</button>-->					
				</div>

				

			</div>
			</form>
		</div> <!--close query body-->
		<div class = "row">
				<div class = "col-md-2">
					<ul style = "list-style-type: none;">
						<li><h3><span class = "label label-default" style = "background-color: #c1423c;">Fewer Occurrences</span></h3></li>
						<li><h3><span class = "label label-default" style = "background-color: #e21106;">More Occurrences</span></h3></li>
					</ul>

				</div>

				<div class = "col-md-9">
					<div id="map" style="height:600px; color:black;"></div>
				</div>

				

			</div>	
	<span id ="result"></span>	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="result_fatalities.js" type="text/javascript"></script>
  </body>
</html>
