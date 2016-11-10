$("#sub").click( function() {
	var data = $("#insertForm :input").serializeArray(); // myForm is from test_inputs.php. We get its inputs.

	$.post( $("#insertForm").attr("action"), data, function(info) {$("#result").html(info); } ); // info is the output of userInfo.php
	clearInputAfterSubmit();
});

$("#insertForm").submit( function() {
  return false;
});

function clearInputAfterSubmit() {
	$("#insertForm :input").each( function() {
		$(this).val('');
	});
}
