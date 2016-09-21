$(document).ready(function()
{
	var feedback;
	$('#remover a').attr("href", "#");
	
	var token = "";
	$.post('functions/token.php', {token: token},
	function(return_data)
	{
		$('#token').html(return_data);
		token = return_data;
	});
	
	$.post('functions/idmsg.php',
	{},
	function(return_data)
	{
		if(return_data)
		{
			//$('#feedback').html(return_data);
			$.post('functions/viewstudentdata.php',
			{
				token: token,
				id: return_data
			},
			function(return_data)
			{
				if(return_data)
				{
					//$('#feedback').html(return_data);
					feedback = return_data.split(", ");
					
					$('#firstfeed').html(feedback[0]);
					$('#middlefeed').html(feedback[1]);
					$('#lastfeed').html(feedback[2]);
					$('#emailfeed').html(feedback[3]);
					$('#rollfeed').html(feedback[4]);
					$('#regfeed').html(feedback[5]);
					$('#levelfeed').html(feedback[6]);
					$('#deptfeed').html(feedback[7]);
					$('#phonefeed').html(feedback[8]);
					$('#datefeed').html(feedback[11]);
					$('#memfeed').html("Student");
					/*if(feedback[7] == 1)
					{
						$('#memfeed').html("Common Member.");
					}*/
					if(feedback[10] == "")
					{
						if(feedback[9] == "female")
						{
							$('#image img').attr("src", "images/female.jpg");
						}
						else if(feedback[9] == "male")
						{
							$('#image img').attr("src", "images/male.jpg");
						}
					}
					else if(feedback[10] != "")
					{
						$('#image img').attr("src", feedback[10]);
					}
					var lineHeight = $('#main_body').outerHeight();
					$('#line1').css('height', lineHeight);
					$('#line').css('height', lineHeight);
				}
			});
		}
	});
	
});