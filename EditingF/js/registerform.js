$(document).ready(function()
{
	$('#img').attr("src", "images/logo.jpg");
	var token = "";
	$.post('functions/token.php', {token: token},
	function(return_data)
	{
		$('#token').html(return_data);
		token = return_data;
	});
	
	$(':button').click(function()
	{
		var first_name = $('[name="first"]').val();
		var last_name = $('[name="last"]').val();
		var username = $('[name="this"]').val();
		var email = $('[name="email"]').val();
		var pass = $('[name="pass"]').val();
		var pass_again = $('[name="pass_again"]').val();
		var gender = $('[name="gender"]:checked').val();
		var captcha = $('[name="captcha"]').val();
		
		if
		(
			!first_name ||
			!last_name ||
			!username ||
			!email ||
			!pass ||
			!pass_again ||
			!gender ||
			!captcha 
		)
		{
			$('#feedback').text('Please fill in all the fields!');
			$('[name="pass"]').val("");
			$('[name="pass_again"]').val("");
			$('[name="captcha"]').val("");
		}
		else if
		(
			first_name && 
			last_name &&
			username &&
			email &&
			pass &&
			pass_again &&
			gender &&
			captcha
		)
		{
			if(pass != pass_again)
			{
				$('#feedback').text('Your passwords do not match!');
				$('[name="pass"]').val("");
				$('[name="pass_again"]').val("");
				$('[name="captcha"]').val("");
			}
			else if(pass == pass_again)
			{
				$.post('captcha/verify.php', {captcha: captcha}, function(return_data)
				{
					if(return_data == "Captcha correct")
					{
						$('[name="captcha"]').val("");
						$('[name="pass"]').val("");
						$('[name="pass_again"]').val("");
						$("#img1").remove();
						$('<img id="img1" src="captcha/captcha.php" />').appendTo("#imgdiv");
						//$('#feedback').text(token);
						$.post('functions/registerform.php',
						{
							first_name: first_name,
							last_name: last_name,
							username: username,
							email: email,
							password: pass,
							pass_again: pass_again,
							gender: gender,
							token: token
						},
						function(return_data)
						{
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
						$('[name="pass"]').val("");
						$('[name="pass_again"]').val("");
						$('[name="captcha"]').val("");
						$('#feedback').text(return_data);
						$("#img1").remove();
						$('<img id="img1" src="captcha/captcha.php" />').appendTo("#imgdiv");
					}
				});
			}
		}
		
		var lineHeight = $('#main_body').outerHeight();
		$('#line1').css('height', lineHeight);
		$('#line').css('height', lineHeight);
	});
	
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
	
	//password validation starts
	function validate_password(password)
	{
		$.post('functions/valid.php', {password: password}, function(data)
		{	
			$('#passfeed').text(data);
		});
	}

	$('[name="pass"]').focusin(function()
	{
		if($('[name="pass"]').val() === '')
		{
			$('#passfeed').text("At least 6 characters.");
		}
		else
		{
			validate_password($('[name="pass"]').val());
		}
	}).blur(function()
	{
		$('#passfeed').text('');
	}).keyup(function()
	{
		validate_password($('[name="pass"]').val());
	});
	//password validation ends
	
	//confirm password validation starts
	function validate_confirm_password(password1, con_password)
	{
		$.post('functions/valid.php', {password1: password1, con_password: con_password}, function(data)
		{	
			$('#passagain').text(data);
		});
	}

	$('[name="pass_again"]').focusin(function()
	{
		if($('[name="pass_again"]').val() === '')
		{
			$('#passagain').text("Must match Password");
		}
		else
		{
			validate_confirm_password($('[name="pass_again"]').val(), $('[name="pass"]').val());
		}
	}).blur(function()
	{
		$('#passagain').text('');
	}).keyup(function()
	{
		validate_confirm_password($('[name="pass_again"]').val(), $('[name="pass"]').val());
	});
	//confirm password validation ends

});