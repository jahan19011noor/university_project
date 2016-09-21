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
	
		var lineHeight = $('#main_body').outerHeight();
		$('#line1').css('height', lineHeight);
		$('#line').css('height', lineHeight);
	
	$(':button').click(function()
	{
		//$('#feedback').html("clicked");
		var first_name = $('[name="first"]').val();
		var middle_name = $('[name="middle"]').val();
		var last_name = $('[name="last"]').val();
		var email = $('[name="email"]').val();
		var roll = $('[name="roll"]').val();
		var reg = $('[name="reg"]').val();
		var level = $('[name="level"]').val();
		var phone = $('[name="phone"]').val();
		var privacy = $('[name="privacy"]:checked').val();
		var dept = $('[name="dept"]:checked').val();
		var captcha = $('[name="captcha"]').val();
		//$('#feedback').html("clicked");
		if
		(
			!first_name ||
			!middle_name ||
			!last_name ||
			!email ||
			!roll ||
			!reg ||
			!level ||
			!phone ||
			!privacy ||
			!dept ||
			!captcha 
		)
		{
			$('#feedback').text('Please fill in all the fields!');
			$('[name="captcha"]').val("");
		}
		else if
		(
			first_name && 
			middle_name &&
			last_name &&
			email &&
			roll &&
			reg &&
			level &&
			phone &&
			privacy &&
			dept &&
			captcha
		)
			{
				//$('#feedback').html("clicked");
				$.post('captcha/verify.php', {captcha: captcha}, function(return_data)
				{
					if(return_data == "Captcha correct")
					{
						//$('#feedback').html("clicked");
						$('[name="captcha"]').val("");
						$("#img1").remove();
						$('<img id="img1" src="captcha/captcha.php" />').appendTo("#imgdiv");
						//$('#feedback').html("clicked");
						//$('#feedback').text(token);
						$.post('functions/studentreg.php',
						{
							first_name: first_name,
							middle_name: middle_name,
							last_name: last_name,
							email: email,
							roll_no: roll,
							reg_no: reg,
							level: level,
							phone: phone,
							privacy: privacy,
							dept: dept,
							token: token
						},
						function(return_data)
						{
							if(return_data == true)
							{
								//$('#feedback').html("successful");	
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
	
	//middle_name validation starts.
	function validate_middle_name(middle_name)
	{
		$.post('functions/valid.php', {middle_name: middle_name}, function(data)
		{	
			$('#middlefeed').text(data);
		});
	}

	$('[name="middle"]').focusin(function()
	{
		if($('[name="middle"]').val() === '')
		{
			$('#middlefeed').text("At least 4 characters.");
		}
		else
		{
			validate_middle_name($('[name="middle"]').val());
		}
	}).blur(function()
	{
		$('#middlefeed').text('');
	}).keyup(function()
	{
		validate_middle_name($('[name="middle"]').val());
	});
	//middle_name validation ends.
	
	//roll_no validation starts.
	function validate_roll_no(roll)
	{
		$.post('functions/valid.php', {roll: roll}, function(data)
		{	
			$('#rollfeed').text(data);
		});
	}

	$('[name="roll"]').focusin(function()
	{
		if($('[name="roll"]').val() === '')
		{
			$('#rollfeed').text("Should be 5 digits.");
		}
		else
		{
			validate_roll_no($('[name="roll"]').val());
		}
	}).blur(function()
	{
		$('#rollfeed').text('');
	}).keyup(function()
	{
		validate_roll_no($('[name="roll"]').val());
	});
	//roll_no validation ends.
	
	//reg_no validation starts
	function validate_reg_no(reg)
	{
		$.post('functions/valid.php', {reg: reg}, function(data)
		{	
			$('#regfeed').text(data);
		});
	}

	$('[name="reg"]').focusin(function()
	{
		if($('[name="reg"]').val() === '')
		{
			$('#regfeed').text("Should be 9 digits.");
		}
		else
		{
			validate_reg_no($('[name="reg"]').val());
		}
	}).blur(function()
	{
		$('#regfeed').text('');
	}).keyup(function()
	{
		validate_reg_no($('[name="reg"]').val());
	});
	//reg_no validation ends.
	
	//level validation starts
	function validate_level(level)
	{
		$.post('functions/valid.php', {level: level}, function(data)
		{	
			$('#levelfeed').text(data);
		});
	}

	$('[name="level"]').focusin(function()
	{
		if($('[name="level"]').val() === '')
		{
			$('#levelfeed').text("Choose your level.");
		}
		else
		{
			validate_level($('[name="level"]').val());
		}
	}).blur(function()
	{
		$('#levelfeed').text('');
	}).change(function()
	{
		validate_level($('[name="level"]').val());
	});
	//level validation ends.
	
	//phone_no validation starts
	function validate_phone_no(phone)
	{
		$.post('functions/valid.php', {phone: phone}, function(data)
		{	
			$('#phonefeed').text(data);
		});
	}

	$('[name="phone"]').focusin(function()
	{
		if($('[name="phone"]').val() === '')
		{
			$('#phonefeed').text("Should be 11 digits.");
		}
		else
		{
			validate_phone_no($('[name="phone"]').val());
		}
	}).blur(function()
	{
		$('#phonefeed').text('');
	}).keyup(function()
	{
		validate_phone_no($('[name="phone"]').val());
	});
	//phone_no validation ends.
});