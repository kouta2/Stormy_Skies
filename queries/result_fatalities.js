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
$("#fate_form").submit( function() {
  return false;
});

function clearInputAfterSubmit() {
        $("#fate_form :input").each( function() {
                $(this).val('');
        });
}
$(document).ready(function () {
    $('#fate_form').on('submit', function(e) {
        //e.preventDefault();
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serializeArray(),
            success: function (data) {
		clearOverlays();
                //$("#result").html(data);
                if(data===''){	
                	$("#sorry").html('NO RESULTS FOUND');
			return;
		}
		else
		{	
                	$("#sorry").html(null);
		}
		var states = data.split(",");
		for (var state of states){
			addOverlay(state);
		}
		// plotting daily weather
		},
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});
