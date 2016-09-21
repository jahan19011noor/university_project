$(document).ready(function()
{
	var token = "";
	var file = "";
	var ext = "";
	var size = "";
	$.post('functions/token.php', {token: token},
	function(return_data)
	{
		$('#token').html(return_data);
		token = return_data;
	});
	
	var feedback;
	$('#remover a').attr("href", "#");
	
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
	
	$(":button").click(function()
	{
		$(":file").trigger('click');
		{
			$(':file').bind('change', function()
			{
				ext = this.value.match(/\.(.+)$/)[1];
				size = this.files[0].size;
				file = $(this).val();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
				{
					$('#filefeed').html("File type is invalid.");
				}
				else if(size > 2097152)
				{
					$('#filefeed').html("File should be maximum 2mb in size.");
				}
				else
				{
					$('#filefeed').html(file+" - File successfully chosen.");
				}
			});
		}
	});
	
	$.post('functions/wronginfo.php',
	function(return_data)
	{
		if(return_data != "" && return_data != false)
		{
			$('#feedback').html(return_data);	
		}
		/*else if(return_data == "")
		{
			$('#feedback').html("successful");	
		}*/
	});
					//validation of newly entered data ends.
});