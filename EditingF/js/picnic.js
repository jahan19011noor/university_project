$(document).ready(function()
{
	//alert("function not reached.");
	$.post('functions/viewpicnic.php',
	{},
	function(return_data)
	{
		//alert("function reached.");
		if(return_data)
		{
			//alert("data returned.");
			feedback = return_data.split(", ");
						
				$('#pic1 img').attr("src", feedback[0]);
				$('#about1').html(feedback[1]);
				$('#pic2 img').attr("src", feedback[2]);
				$('#about2').html(feedback[3]);
				$('#pic3 img').attr("src", feedback[4]);
				$('#about3').html(feedback[5]);
		}
		var lineHeight = $('#main_body').outerHeight();
		$('#line1').css('height', lineHeight);
		$('#line').css('height', lineHeight);
	});
});