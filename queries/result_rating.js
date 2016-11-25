$("#search_earthquakes").click(function() {
        var data = $("#richter_form :input").serializeArray();

        $.post( $("#richter_form").attr("action"), data, function(info) {$("#result_earthquakes").html(info); } );  

        clearInputAfterSubmitEarthquakes();

});

$("#richter_form").submit( function() {
        return false;
});

function clearInputAfterSubmitEarthquakes() {
        $("#richter_form :input").each( function() {
                $(this).val('');
        });
}
$("#search_hurricanes").click(function() {
        var data = $("#category_form :input").serializeArray();

        $.post( $("#category_form").attr("action"), data, function(info) {$("#result_hurricanes").html(info); } );  

        clearInputAfterSubmitHurricanes();

});

$("#category_form").submit( function() {
        return false;
});

function clearInputAfterSubmitHurricanes() {
        $("#category_form :input").each( function() {
                $(this).val('');
        });
}
$("#search_fires").click(function() {
        var data = $("#acreage_form :input").serializeArray();

        $.post( $("#acreage_form").attr("action"), data, function(info) {$("#result_fires").html(info); } );  

        clearInputAfterSubmitFires();

});

$("#acreage_form").submit( function() {
        return false;
});

function clearInputAfterSubmitFires() {
        $("#acreage_form :input").each( function() {
                $(this).val('');
        });
}
$("#search_tornadoes").click(function() {
        var data = $("#f_rating_form :input").serializeArray();

        $.post( $("#f_rating_form").attr("action"), data, function(info) {$("#result_tornadoes").html(info); } );  

        clearInputAfterSubmitTornadoes();

});

$("#f_rating_form").submit( function() {
        return false;
});

function clearInputAfterSubmitTornadoes() {
        $("#f_rating_form :input").each( function() {
                $(this).val('');
        });
}
