$(document).ready( function() {

        $.getJSON("queryByDate.php", function(data) {
                $("ul").empty();

                $.each(data.result, function() {

                        $("ul").append("<li>Date: "+ this['Date']+"</li><li>Fatalities: "+ this['Fatalities']+"</li><li>Region: "+ this['Region']+"</li><li>Tornadoes: "+ this['Tornadoes']+"</li><br />");

                });
        });
});
