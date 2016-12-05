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
	function addMarker(row, severe_exists){
		row_split = row.split(",");
		var lat_lng = {lat: parseFloat(row_split[3]), lng: parseFloat(row_split[4])};

		// var precipitation = Math.min(Math.abs(parseFloat(row_split[6])), 10);
		// var snowfall = Math.max(parseFloat(row_split[7]), 0);

		var station_name = "Station Name: " + row_split[1].toUpperCase();
		var date = "Date: " + row_split[5];
		var elevation = "Elevation: " + row_split[2];
		var lat = "Latitude: " + row_split[3] + "°";
		var lng = "Longitude: " + row_split[4] + "°";
		var prcp = "Precipitation: " + row_split[6] /*precipitation.toString()*/ + " in.";
		var snow = "Snowfall: " + row_split[7] /*snowfall.toString()*/ + " in.";
		var tavg = "Average Temperature: " + row_split[8] + " °F";
		var tmax = "Maximum Temperature: " + row_split[9] + " °F";
		var tmin = "Minimum Temperature: " + row_split[10] + " °F";

  		var infoWindow = new google.maps.InfoWindow({
			content: '<div id="hook" style="height:200px; width:270px; overflow-x:hidden; overflow-y:scroll; white-space:wrap;"><p>' + station_name + '</p><p>' + date + '</p><p>' + elevation + '</p><p>' + lat + '</p><p>' + lng + '</p><p>' + prcp + '</p><p>' + snow + '</p><p>' + tavg + '</p><p>' + tmax + '</p><p>' + tmin + '</p></div>',
			maxWidth: 270
			// content: contentString
		});

		var image = "../img/red.png"; 
		var avg_temp = parseFloat(row_split[8]);
		if(avg_temp < 25)
		{
			image = "../img/blue.png";
		}
		else if(avg_temp >= 25 && avg_temp < 40)
		{
			image = "../img/purple.png";
		}
		else if(avg_temp >= 40 && avg_temp < 60)
		{
			image = "../img/green.png";
		}
		else if(avg_temp >= 60 && avg_temp < 80)
		{
			image = "../img/yellow.png";
		}
		var station_marker = new google.maps.Marker({
			position: lat_lng,
			map: map,
			icon: image
		});

		station_marker.addListener('click', function() {
			infoWindow.open(map, station_marker);
		});

		info_window_list.push(infoWindow);
		markers_list.push(station_marker);
	}

	function addWeatherMarker(row, lat_lng)
	{
		var row_split = row.split("!");
		var weather_name = row_split[0];
		var image = "";
		var content_of_window = "";
		if(weather_name == "tornadoes")
		{
			image = "../img/tornado_icon.png";
			content_of_window = '<div id="hook" style="height:200px; width:270px; overflow-x:hidden; overflow-y:scroll; white-space:wrap;"><p>Name: ' + row_split[1].toUpperCase() + '</p><p>Date: ' + row_split[2] + '</p><p>States Affected: ' + row_split[3] + '</p><p>Number of Tornadoes: ' + row_split[4] + '</p><p>Fatalities: ' + row_split[5] + '</p></div>';
		}
		else if(weather_name == "hurricanes")
		{
			image = "../img/hurricane_icon.gif"; //.png";
			content_of_window = '<div id="hook" style="height:200px; width:270px; overflow-x:hidden; overflow-y:scroll; white-space:wrap;"><p>Name: ' + row_split[1].toUpperCase() + '</p><p>Date: ' + row_split[2] + '</p><p>Category: ' + row_split[3] + '</p><p>Fatalities: ' + row_split[4] + '</p><p>States Affected: ' + row_split[5] + '</p></div>';
		}
		else if(weather_name == "earthquakes")
		{
			image = "../img/earthquake_icon.png";
			content_of_window = '<div id="hook" style="height:200px; width:270px; overflow-x:hidden; overflow-y:scroll; white-space:wrap;"><p>Date: ' + row_split[1].toUpperCase() + '</p><p>States Affected: ' + row_split[2] + '</p><p>Magnitude: ' + row_split[3] + '</p><p>Fatalities: ' + row_split[4] + '</p></div>';
		}
		else if(weather_name == "fires")
		{
			image = "../img/fire_icon.png";
			content_of_window = '<div id="hook" style="height:200px; width:270px; overflow-x:hidden; overflow-y:scroll; white-space:wrap;"><p>Name: ' + row_split[3].toUpperCase() + '</p><p>Year: ' + row_split[1] + '</p><p>Acreage: ' + row_split[2] + '</p><p>States Affected: ' + row_split[4] + '</p></div>';
		}
		else
		{
			return;
		}
 
 		var infoWindow = new google.maps.InfoWindow({
			content: content_of_window,
			maxWidth: 270
		});

		var weather_marker = new google.maps.Marker({
			position: lat_lng,
			map: map,
			icon: image
		});

		weather_marker.addListener('click', function() {
			infoWindow.open(map, weather_marker);
		});

		info_window_list.push(infoWindow);
		markers_list.push(weather_marker);
	}


	function addOverlay(row){
		var data_split = row.split("!");
		var weather_name = data_split[0];
		var color = '#FF0000'; // red
		var states_str = '';
		if(weather_name == "fires")
		{
			states_str = data_split[4];
			// color
		}
		else if(weather_name == "hurricanes")
		{
			states_str = data_split[5];
			color = '#000066'; // blue
		}
		else if(weather_name == "tornadoes")
		{
			states_str = data_split[3];
			color = '#660066'; // purple
		}
		else
		{
			states_str = data_split[2];
			color = '#FF9933'; // green
		}
		var states = states_str.split(",");

		var first = 1;		
		for(var state of states)
		{
			var state_poly=new google.maps.Polygon({
        			paths: getCoords(state),
        			strokeColor: color, // '#FF0000',
        			strokeOpacity: 0.8,
        			strokeWeight: 2,
        			fillColor: color, // '#FF0000',
        			fillOpacity: 0.35
        		});
        		state_poly.setMap(map);
			overlays_list.push(state_poly);
			if(first == 1)
			{
				first = 0;
				var path = getCoords(state);
				var lat_lng = path[0]; // .getAt(0);
				addWeatherMarker(row, lat_lng);
			}
		}
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

$("#pred_form").submit( function() {
  return false;
});

function clearInputAfterSubmit() {
        $("#pred_form :input").each( function() {
                $(this).val('');
        });
}
$(document).ready(function () {
    $('#pred_form').on('submit', function(e) {
        //e.preventDefault();
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serializeArray(),
            success: function (data) {
		clearOverlays();
                $("#result").html(data);
		var states_daily_split = data.split("~");

		// check if states_daily_split[0] length == 0

		var severe_weathers = states_daily_split[0].split(";");
		// var states = states_daily_split[0].split(",");
		// for (var state of states){
			// addOverlay(state);
		// }
		var severe_exists = 0;
		for (var sev_weth of severe_weathers)
		{
			if(sev_weth.length > 2)
			{
				severe_exists = 1;
				addOverlay(sev_weth);
			}
		}
/*
		// plotting daily weather
		var daily_split_rows = states_daily_split[1].split(";");
		if(daily_split_rows.length > 0) {
			for(var i = 0; i < daily_split_rows.length; i++) {
				row = daily_split_rows[i];
				if(row.length > 2) {
					addMarker(row, severe_exists);
				}
			}
		}
*/
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});
