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
			$.post('functions/viewteacherdata.php',
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
					$('#postfeed').html(feedback[4]);
					$('#deptfeed').html(feedback[6]);
					$('#phonefeed').html(feedback[5]);
					$('#datefeed').html(feedback[9]);
					$('#memfeed').html("Teacher");
					/*if(feedback[7] == 1)
					{
						$('#memfeed').html("Common Member.");
					}*/
					if(feedback[8] == "")
					{
						if(feedback[7] == "female")
						{
							$('#image img').attr("src", "images/female.jpg");
						}
						else if(feedback[7] == "male")
						{
							$('#image img').attr("src", "images/male.jpg");
						}
					}
					else if(feedback[8] != "")
					{
						$('#image img').attr("src", feedback[8]);
					}
					var lineHeight = $('#main_body').outerHeight();
					$('#line1').css('height', lineHeight);
					$('#line').css('height', lineHeight);
				}
			});
		}
	});
	
});