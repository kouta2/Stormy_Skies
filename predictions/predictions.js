var overlay;
var map;
var overlays_list=[];
var markers_list=[];
var markers_list2=[];
var markers_list3=[];
var info_window_list=[];
var global_index = 0;

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
	function addMarker(daily_split_rows, i){
		
		window.setTimeout(function() {
		for(var j=0;j<50;j++){	
			var row = daily_split_rows[j * 365 + i];
			row_split = row.split(",");
			var lat_lng = {lat: parseFloat(row_split[3]), lng: parseFloat(row_split[4])};
			if(parseFloat(row_split[8]) == -99.9)
			{
				continue;
			}
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
			markers_list3.push(station_marker);
		}
		clearOverlays();
		markers_list = markers_list2;
		markers_list2 = markers_list3;
		markers_list3=[];
		var progress = '<div class="progress-bar" role="progressbar" style="width: '+ ((i+1)*100.0)/365 +'%;"></div>';
		$('#progress').html(null);
		$('#progress').html(progress);
	}, i*120);
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
			delete overlays_list[i];
		}
		overlays_list.length=0;
		for(var i=0;i<markers_list.length;i++)
		{
			markers_list[i].setMap(null);
			delete markers_list[i];
		}
		markers_list.length=0;
		for(var i=0;i<info_window_list.length;i++)
		{
			info_window_list[i].setMap(null);
			delete info_window_list[i];
		}
		info_window_list.length=0;
	}
	google.maps.event.addDomListener(window, 'load', initMap);

$("#pred_form").submit( function() {
  return false;
});

function sleep(miliseconds) 
{
   var currentTime = new Date().getTime();

   while (currentTime + miliseconds >= new Date().getTime()) {
   }
}

function plotEveryDay(data)
{
	
	var states_daily_split = data.split("~");


	var severe_weathers = states_daily_split[0].split(";");
	var daily_split_rows = states_daily_split[1].split(";");
/*
	for(var station of daily_split_rows)
	{
		if(station.length > 2)
		{
			addMarker(station);
		}
	}
	for(var sev_weth of severe_weathers)
	{
		if(sev_weth.length > 2)
		{
			addOverlay(sev_weth);
		}
	}
*/

	var index_of_severe = 0;

	// global_index = 0;
	for(var i = 0; i < 365; i++) // 365 days
	{
		var timerID = 0;
		// timerID = window.setTimeout(function(){
		// clearOverlays();
		var date;
	//	for(var j = 0; j < 50; j++) // 50 stations
	//	{
			// var row_split = row.split(",");
			// date = row_split[5]; // .replace("-", "/");
		//	if(row.length > 2) 
		//	{
		addMarker(daily_split_rows, i);
		//	}
	//	}
		// global_index++;
		// i += 29;
/*
		if(index_of_severe < severe_weathers.length)
		{
			date = date.replace("-", "/"); 
			var row_severe = severe_weathers[index_of_severe];
			var bool = false;
			if(row_severe[0] == "tornadoes")
			{
				if(date.localeCompare(row_severe[2]) == 0)
				{
					bool = true;
				}
			}
			else if(row_severe[0] == "earthquakes")
			{
				if(date.localeCompare(row_severe[1]) == 0)
				{
					bool = true;
				}
			}
			else if(row_severe[0] == "hurricanes")
			{
				if(date.localeCompare(row_severe[2]) == 0)
				{
					bool = true;
				}
			}

			while(bool == true)
			{
				addOverlay(row_severe);
				index_of_severe++;
				row_severe = severe_weathers[index_of_severe];
				bool = false;
				if(row_severe[0] == "tornadoes")
				{
					if(date.localeCompare(row_severe[2]) == 0)
					{
						bool = true;
					}
				}
				else if(row_severe[0] == "earthquakes")
				{
					if(date.localeCompare(row_severe[1]) == 0)
					{
						bool = true;
					}

				}
				else if(row_severe[0] == "hurricanes")
				{
					if(date.localeCompare(row_severe[2]) == 0)
					{
						bool = true;
					}
				}
			}
		}
*/
		// }, 200);

		// sleep(200);
		// return;
		// clearOverlays();
	}

}

function clearInputAfterSubmit() {
        $("#pred_form :input").each( function() {
                $(this).val('');
        });
}
$(document).ready(function () {
    $('#pred_form').on('submit', function(e) {
        //e.preventDefault();
        // for(var i = 1; i < 13; i++)
	// {
	    // var temp = i.toString() + "/1/" + ($('form').serializeArray())[0]['value']; // .serializeArray();
	    // var timerID = setInterval(function(){
	    $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serializeArray(), // ({date: temp}), // .serializeArray(), 
                success: function (data) {
		    clearOverlays();
                    // $("#result").html(data);
		    plotEveryDay(data);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }

            });
	    // }, 1000);
	// }
    });
});
