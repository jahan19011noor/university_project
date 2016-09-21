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
			$.post('functions/viewprofiledata.php',
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
					$('#lastfeed').html(feedback[1]);
					$('#userfeed').html(feedback[2]);
					$('#emailfeed').html(feedback[3]);
					$('#datefeed').html(feedback[6]);
					if(feedback[7] == 1)
					{
						$('#memfeed').html("Common Member.");
					}
					else
					{
						$('#memfeed').html(feedback[7]);
					}
					if(feedback[5] == "")
					{
						if(feedback[4] == "female")
						{
							$('#image img').attr("src", "images/female.jpg");
						}
						else if(feedback[4] == "male")
						{
							$('#image img').attr("src", "images/male.jpg");
						}
					}
					else if(feedback[5] != "")
					{
						$('#image img').attr("src", feedback[5]);
					}
					var lineHeight = $('#main_body').outerHeight();
					$('#line1').css('height', lineHeight);
					$('#line').css('height', lineHeight);
				}
			});
		}
	});
	
});