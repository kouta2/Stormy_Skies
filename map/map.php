<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Stormy Skies</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
 
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwvDeUmfCVgrrUyU29pb_kWzjW600k3Ac"></script>
    <script type="text/javascript" src="us_borders_dict.js"></script>
    <script>
      // This example creates a custom overlay called USGSOverlay, containing
      // a U.S. Geological Survey (USGS) image of the relevant area on the map.

      // Set the custom overlay object's prototype to a new instance
      // of OverlayView. In effect, this will subclass the overlay class therefore
      // it's simpler to load the API synchronously, using
      // google.maps.event.addDomListener().
      // Note that we set the prototype to an instance, rather than the
      // parent class itself, because we do not wish to modify the parent class.

      var overlay;
      USGSOverlay.prototype = new google.maps.OverlayView();

      // Initialize the map and the custom overlay.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: 60, lng: -150},
        });
/*
      function loadXMLDoc() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      myFunction(this);
                  }
            };
            xmlhttp.open("GET", "resources/us_borders.xml", true);
            xmlhttp.send();
      }
      function myFunction(xml)
      {
         return xml.responseXML;
      }
 
  	var txt = "";
  	var parser = new DOMParser();
  	var xmlDoc = parser.parseFromString(txt.loadXMLdoc,"text/xml");
  	var statesize = xmlDoc.getElementsByTagName("state")[0].childNodes.length;
  	var coords = [];
*/
/*
    var state = document.getElementsByTagName("state")[0];
  	for(i = 1; i < statesize; i+=2)
  	{
        var x = state.childNodes[i].getAttribute("lat");
        var y = state.childNodes[i].getAttribute("lng");
        coords.push({lat: x, lng: y}); 
  	}

  	// parse state
  	// var coords = new parse(state);

  	var overlay = new google.maps.Polygon({
  	  paths: coords,
  	  strokeColor: '#FF0000',
  	  strokeOpacity: 0.8,
  	  strokeWeight: 2,
  	  fillColor: '#FF000',
  	  fillOpacity: 0.35
  	});
  	overlay.setMap(map);
*/
/*
  	var triangleCoords = [
            {lat: 25.774, lng: -80.190},
            {lat: 18.466, lng: -66.118},
            {lat: 32.321, lng: -64.757},
            {lat: 25.774, lng: -80.190}
          ];
*/
          // Construct the polygon.
          var bermudaTriangle = new google.maps.Polygon({
            paths: getCoords("california") /*us_borders_dict["alabama"]*/ /*triangleCoords*/,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
          });
          bermudaTriangle.setMap(map);
  	
          // var bounds = new google.maps.LatLngBounds(
              // new google.maps.LatLng(62.281819, -150.287132),
              // new google.maps.LatLng(62.400471, -150.005608));

          // The photograph is courtesy of the U.S. Geological Survey.
          // var srcImage = 'https://developers.google.com/maps/documentation/' +
          //    'javascript/examples/full/images/talkeetna.png';

          // The custom USGSOverlay object contains the USGS image,
          // the bounds of the image, and a reference to the map.
          // overlay = new USGSOverlay(bounds, srcImage, map);
        }


        /** @constructor */
        function USGSOverlay(bounds, image, map) {

          // Initialize all properties.
          this.bounds_ = bounds;
          this.image_ = image;
          this.map_ = map;

          // Define a property to hold the image's div. We'll
          // actually create this div upon receipt of the onAdd()
          // method so we'll leave it null for now.
          this.div_ = null;

          // Explicitly call setMap on this overlay.
          this.setMap(map);
        }


        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

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
		        <li><a href="#">Predictions</a></li>
		        <li><a href="../map/map.php">Map</a></li>
		        
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
					<div id="map" style="height:600px;"></div>
				</div>

				<div class = "col-md-2"></div>

			</div>

  	</body>
</html>
