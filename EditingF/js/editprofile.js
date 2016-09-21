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
					
					$('[name="first"]').val(feedback[0]);
					$('[name="last"]').val(feedback[1]);
					$('[name="this"]').val(feedback[2]);
					$('[name="email"]').val(feedback[3]);
					//$('#datefeed').html(feedback[5]);
					if(feedback[7] == 1)
					{
						$('#memfeed').html("Common Member.");
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
					$('#firstfeed').html(" -> your current First Name.");
					$('#lastfeed').html(" -> your current Last Name.");
					$('#userfeed').html(" -> your current Username.");
					$('#emailfeed').html(" -> your current Email.");
					
					var lineHeight = $('#main_body').outerHeight();
					$('#line1').css('height', lineHeight);
					$('#line').css('height', lineHeight);
				}
			});
		}
		
	});
	
	//validation of newly entered data starts.
	$(':button').click(function()
	{
		var first_name = $('[name="first"]').val();
		var last_name = $('[name="last"]').val();
		var username = $('[name="this"]').val();
		var email = $('[name="email"]').val();
		var captcha = $('[name="captcha"]').val();
			
		if
		(
			!first_name ||
			!last_name ||
			!username ||
			!email ||
			!captcha 
		)
		{
			$('#feedback').text('Please fill in all the fields!');
			$('[name="captcha"]').val("");
		}
		else if
		(
			first_name && 
			last_name &&
			username &&
			email &&
			captcha
		)
		{
			//$('#feedback').text('All values provided.');
			$.post('captcha/verify.php', {captcha: captcha}, function(return_data)
			{
				if(return_data == "Captcha correct")
				{
					$('[name="captcha"]').val("");
					$('[name="pass"]').val("");
					$('[name="pass_again"]').val("");
					$("#img1").remove();
					$('<img id="img1" src="captcha/captcha.php" />').appendTo("#imgdiv");
					//$('#feedback').text("captcha correct.");
					
					
					$.post('functions/updatedata.php',
						{
							first_name: first_name,
							last_name: last_name,
							username: username,
							email: email
						},
						function(return_data)
						{
							//$('#feedback').html(return_data);
							if(return_data == true)
							{
								window.location = "index.php";
							}
							else if(return_data == "")
							{
								$('#feedback').html("unsuccessful");	
							}
							else
							{
								$('#feedback').html(return_data);	
							}
						});
				}
				else
				{
					$('[name="captcha"]').val("");
					$('#feedback').text(return_data);
					$("#img1").remove();
					$('<img id="img1" src="captcha/captcha.php" />').appendTo("#imgdiv");
				}
			});
		}
	});
	//validation of newly entered data ends.
	
	//email validation starts
	function validate_email(email)
	{
		$.post('functions/valid.php', {email: email}, function(data)
		{	
			$('#emailfeed').text(data);
		});
	}

	$('[name="email"]').focusin(function()
	{
		if($('[name="email"]').val() === '')
		{
			$('#emailfeed').text("Please enter a valid email.");
		}
		else
		{
			validate_email($('[name="email"]').val());
		}
	}).blur(function()
	{
		$('#emailfeed').text('');
	}).keyup(function()
	{
		validate_email($('[name="email"]').val());
	});
	//email validation ends
	
	//first_name validation starts.
	function validate_first_name(first_name)
	{
		$.post('functions/valid.php', {first_name: first_name}, function(data)
		{	
			$('#firstfeed').text(data);
		});
	}

	$('[name="first"]').focusin(function()
	{
		if($('[name="first"]').val() === '')
		{
			$('#firstfeed').text("At least 4 characters.");
		}
		else
		{
			validate_first_name($('[name="first"]').val());
		}
	}).blur(function()
	{
		$('#firstfeed').text('');
	}).keyup(function()
	{
		validate_first_name($('[name="first"]').val());
	});
	//first_name validation ends.
	
	//last_name validation starts.
	function validate_last_name(last_name)
	{
		$.post('functions/valid.php', {last_name: last_name}, function(data)
		{	
			$('#lastfeed').text(data);
		});
	}

	$('[name="last"]').focusin(function()
	{
		if($('[name="last"]').val() === '')
		{
			$('#lastfeed').text("At least 4 characters.");
		}
		else
		{
			validate_last_name($('[name="last"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed').text('');
	}).keyup(function()
	{
		validate_last_name($('[name="last"]').val());
	});
	//last_name validation ends.
	
	//username validaton starts
	function validate_user_name(username)
	{
		$.post('functions/valid.php', {username: username}, function(data)
		{	
			$('#userfeed').text(data);
		});
	}

	$('[name="this"]').focusin(function()
	{
		if($('[name="this"]').val() === '')
		{
			$('#userfeed').text("At least 4 characters.");
		}
		else
		{
			validate_user_name($('[name="this"]').val());
		}
	}).blur(function()
	{
		$('#userfeed').text('');
	}).keyup(function()
	{
		validate_user_name($('[name="this"]').val());
	});
	//username validation starts
	
});