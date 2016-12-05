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
		        

		        <li><a style = "color:white;" href="#" class = "active" >Queries</a></li>
		        <li><a style = "color:white;" href="../predictions/predictions.php">Playback</a></li>
		        
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
			  	<li role="presentation"><a style = "color:white;" href="predictions.php">Annual</a></li>
			 	<li role="presentation"><a style = "color:white;" href="query_date.php">Date</a></li>
			  	<li role="presentation"><a style = "color:white;" href="query_fatalities.php">Fatalities</a></li>
			  	<li role="presentation" class ="active"><a href="query_rating.php">Rating</a></li>
			  	
			</ul>
			
			<form id="richter_form" action="earthquakeRating.php" method="post">
			<div class = "row insert_criteria">
				<div class = "col-md-1"></div>
				<div class = "col-md-2">
					<h4>Earthquakes:</h4>

				</div>
			
				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Richter (Lower)</span>
					 	<input type="text" name="lower" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>
				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Richter (Upper)</span>
					 	<input type="text" name="upper" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>			

				<div class = "col-md-2">
					<div style ="margin: 0 auto;width: 50%;">
						<button type="submit" class="btn btn-success" id = "search_earthquakes">Search Earthquakes</button>	
					</div>

				</div>
			</div>
			</form>
			<form id="category_form" action="hurricaneRating.php" method="post">
			<div class = "row insert_criteria">

				<div class = "col-md-1"></div>
			
				<div class = "col-md-2">
					<h4>Hurricanes:</h4>

				</div>
			
				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Category(Lower)</span>
					 	<input type="text" name="lower" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>

				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Category(Upper)</span>
					 	<input type="text" name="upper" class="form-control" id="basic-url" placeholder="">
					</div>
				</div>			

				<div class = "col-md-2">
					<div style ="margin: 0 auto;width:50%;">
						<button type="submit" class="btn btn-success" id = "search_hurricanes">Search Hurricanes</button>	
					</div>				
				</div>
			</div>
			</form>
			<form id="f_rating_form" action="tornadoRating.php" method="post">
			<div class = "row insert_criteria">

				<div class = "col-md-1"></div>
				<div class = "col-md-2">
					<h4>Tornadoes:</h4>

				</div>
			
				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Number of Tornadoes(Lower)</span>
					 	<input type="text" name="lower" class="form-control" id="f_lower" placeholder="">
					</div>
				</div>

				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Number of Tornadoes(Upper)</span>
					 	<input type="text" name="upper" class="form-control" id="f_upper" placeholder="">
					</div>
				</div>			

				<div class = "col-md-2">
					<div style ="margin: 0 auto;width: 50%;">
						<button type="submit" class="btn btn-success" id = "search_tornadoes">Search Tornadoes</button>	
					</div>				
				</div>
			</div>
			</form>
			<form id="acreage_form" action="fireRating.php" method="post">
			<div class = "row insert_criteria">

				<div class = "col-md-1"></div>
				<div class = "col-md-2">
					<h4>Fires:</h4>

				</div>
			
				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Acreage(Lower)</span>
					 	<input type="text" name="lower" class="form-control" id="a_lower" placeholder="">
					</div>
				</div>

				<div class = "col-md-3">
					<div class="input-group">
					  	<span class="input-group-addon">Acreage(Upper)</span>
					 	<input type="text" name="upper" class="form-control" id="a_upper" placeholder="">
					</div>
				</div>			

				<div class = "col-md-2">
					<div style ="margin: 0 auto;width:50%;">					
						<button type="submit" class="btn btn-success" id = "search_fires">Search Fires</button>	
					</div>				
				</div>
			</div>
			</form>
		</div> <!--close query body-->	

		<div class = "row">
			<div class="col-md-5"></div>
			<div class = "col-md-2"> <span id= "sorry" style="text-align: center;"></span></div>
			<div class="col-md-5"></div>

		</div>

	<span id="result_earthquakes"></span>
	<span id="result_hurricanes"></span>
	<span id="result_tornadoes"></span>
	<span id="result_fires"></span>	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="result_rating.js" type="text/javascript"></script>
  </body>
</html>
