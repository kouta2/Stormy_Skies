$("#sub").click(function() {
      	var data = $("#fate_form :input").serializeArray();

        $.post( $("#fate_form").attr("action"), data, function(info) {$("#result").html(info); } );  

        clearInputAfterSubmit();

});

$("#fate_form").submit( function() {
        return false;
});

function clearInputAfterSubmit() {
        $("#fate_form :input").each( function() {
                $(this).val('');
        });
}
