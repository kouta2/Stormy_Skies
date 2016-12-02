var overlay;
var map;
var overlays_list=[];
var markers_list=[];
var info_window_list=[];
USGSOverlay.prototype = new google.maps.OverlayView();

      	// Initialize the map and the custom overlay.

      	function initMap() {
        	map = new google.maps.Map(document.getElementById('map'), {
          	zoom: 4,
          	center: {lat: 39.833, lng: -98.583},
        });
	}
	
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
	function addMarker(row){
		row_split = row.split(",");
		var lat_lng = {lat: parseFloat(row_split[3]), lng: parseFloat(row_split[4])};
		if(isMarkerNearPoly(lat_lng) == false){
			return;
		}
		var station_name = "Station Name: " + row_split[1];
		var date = "Date: " + row_split[5];
		var elevation = "Elevation: " + row_split[2];
		var lat = "Latitude: " + row_split[3] + "°";
		var lng = "Longitude: " + row_split[4] + "°";
		var prcp = "Precipitation: " + row_split[6] + " in.";
		var snow = "Snowfall: " + row_split[7] + " in.";
		var tavg = "Average Temperature: " + row_split[8] + " °F";
		var tmax = "Maximum Temperature: " + row_split[9] + " °F";
		var tmin = "Minimum Temperature: " + row_split[10] + " °F";

  		var infoWindow = new google.maps.InfoWindow({
			content: '<div id="hook" style="height:200px; width:270px; overflow-x:hidden; overflow-y:scroll; white-space:nowrap;"><p>' + station_name + '</p><p>' + date + '</p><p>' + elevation + '</p><p>' + lat + '</p><p>' + lng + '</p><p>' + prcp + '</p><p>' + snow + '</p><p>' + tavg + '</p><p>' + tmax + '</p><p>' + tmin + '</p></div>',
			maxWidth: 270
			// content: contentString
		});
		var station_marker = new google.maps.Marker({
			position: lat_lng,
		});

		station_marker.addListener('click', function() {
			infoWindow.open(map, station_marker);
		});

		station_marker.setMap(map);
		info_window_list.push(infoWindow);
		markers_list.push(station_marker);
	}

	function isMarkerInPoly(position, poly) {
		var point = new google.maps.LatLng(position.lat, position.lng);
		return google.maps.geometry.poly.containsLocation(point, poly);
	}

	function isMarkerNearPoly(position) {
		for(var i=0; i<overlays_list.length;i++) {
			var poly = overlays_list[i]; // .getPath();
			if(isMarkerInPoly(position, poly)){
				return true;
			}
			else {
				var threshold = 600000;
				var path = poly.getPath();
				for(var j = 0; j < path.length; j++) {
					var lat1 = position.lat;
					var lat2 = path.getAt(i).lat();
					var lon1 = position.lng;
					var lon2 = path.getAt(i).lng();
					var R = 6371000; // metres
					var latitude1 = (lat1*3.14)/180;
					var latitude2 = (lat2*3.14)/180;
					var diff_lat = ((lat2-lat1)*3.14)/180;
					var diff_lon = ((lon2-lon1)*3.14)/180;

					var a = Math.sin(diff_lat/2) * Math.sin(diff_lat/2) +
        					Math.cos(latitude1) * Math.cos(latitude2) *
        					Math.sin(diff_lon/2) * Math.sin(diff_lon/2);
					var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

					var dist = R * c;
					if(dist < threshold) {
						return true;
					}
				}
			}
		}
		return false;
	}

	function addOverlay(state){
			var state_poly=new google.maps.Polygon({
            			paths: getCoords(state),
            			strokeColor: '#FF0000',
            			strokeOpacity: 0.8,
            			strokeWeight: 2,
            			fillColor: '#FF0000',
            			fillOpacity: 0.35
          			});
          		state_poly.setMap(map);
			overlays_list.push(state_poly);
	}

	function clearOverlays(){
		for(var i=0;i<overlays_list.length;i++)
		{
			overlays_list[i].setMap(null);
		}
		overlays_list.length=0;
		for(var i=0;i<markers_list.length;i++)
		{
			markers_list[i].setMap(null);
		}
		markers_list.length=0;
		for(var i=0;i<info_window_list.length;i++)
		{
			info_window_list[i].setMap(null);
		}
		info_window_list.length=0;
	}
	google.maps.event.addDomListener(window, 'load', initMap);
/*$("#sub").click( function() {
        var data = $("#date_form :input").serializeArray(); // myForm is from test_inputs.php. We get its inputs.

        $.post( $("#date_form").attr("action"), data, 
		function(info) {
			$("#result").html(info); 
			var states = info.split(",");
			for (var state of states){
				addOverlay(state);
			}
		} 
	);	
	clearInputAfterSubmit();
});*/

$("#date_form").submit( function() {
  return false;
});

function clearInputAfterSubmit() {
        $("#date_form :input").each( function() {
                $(this).val('');
        });
}
$(document).ready(function () {
    $('#date_form').on('submit', function(e) {
        //e.preventDefault();
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serializeArray(),
            success: function (data) {
		clearOverlays();
                $("#result").html(data);
		var states_daily_split = data.split("~");
		var states = states_daily_split[0].split(",");
		var i = 1;
		for (var state of states){
			if(i == 1) {

			}
			addOverlay(state);
		}

		// plotting daily weather
		var daily_split_rows = states_daily_split[1].split(";");
		// $("#result").html(daily_split_rows);
		if(daily_split_rows.length > 2) {
			for (var row of daily_split_rows) {
				if(row.length > 2) {
					addMarker(row);
				}
			}
		}
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});
