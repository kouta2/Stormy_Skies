$("#sub").click( function() {
	var data = $("#myForm :input").serializeArray(); // myForm is from test_inputs.php. We get its inputs.

	$.post( $("#myForm").attr("action"), data, function(info) {$("#result").html(info); } ); // info is the output of userInfo.php
	clearInputAfterSubmit();
});

$("#myForm").submit( function() {
  return false;
});

function clearInputAfterSubmit() {
	$("#myForm :input").each( function() {
		$(this).val('');
	});
}
