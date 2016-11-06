<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Adding a Custom Overlay</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwvDeUmfCVgrrUyU29pb_kWzjW600k3Ac"></script>
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
          zoom: 7,
          center: {lat: 22, lng: -70.109291},
        });

      function loadXMLDoc() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      putIntoDoc(this);
                  }
            };
            xmlhttp.open("GET", "resources/us_borders.xml", true);
            xmlhttp.send();
      }
      function myFunction(xml)
      {
         return xml.responseXML;
      }

	var xmlDoc = loadXMLDoc();
	var statesize = xmlDoc.getElementsByTagName("state")[0].childNodes.length;
	var coords = [];
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

	/*
	var triangleCoords = [
          {lat: 25.774, lng: -80.190},
          {lat: 18.466, lng: -66.118},
          {lat: 32.321, lng: -64.757},
          {lat: 25.774, lng: -80.190}
        ];

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
	*/
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
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>
