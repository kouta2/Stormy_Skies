$("#sub").click( function() {
        var data = $("#date_form :input").serializeArray(); // myForm is from test_inputs.php. We get its inputs.

        $.post( $("#date_form").attr("action"), data, function(info) {$("#result").html(info); } ); // info is the output of userInfo.php
        clearInputAfterSubmit();
});

$("#date_form").submit( function() {
  return false;
});

function clearInputAfterSubmit() {
        $("#date_form :input").each( function() {
                $(this).val('');
        });
}
