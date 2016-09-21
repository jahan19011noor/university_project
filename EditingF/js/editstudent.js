$(document).ready(function()
{
	var token = "";
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
					
					$('[name="first"]').val(feedback[0]);
					$('[name="middle"]').val(feedback[1]);
					$('[name="last"]').val(feedback[2]);
					$('[name="email"]').val(feedback[3]);
					$('[name="roll"]').val(feedback[4]);
					$('[name="reg"]').val(feedback[5]);
					$('[name="level"]').val(feedback[6]);
					$('[name="dept"]').val(feedback[7]);
					$('[name="phone"]').val(feedback[8]);
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
					$('#firstfeed').html(" -> your current First Name.");
					$('#lastfeed').html(" -> your current Last Name.");
					$('#middlefeed').html(" -> your current Mid Name.");
					$('#emailfeed').html(" -> your current Email.");
					$('#rollfeed').html(" -> your current Roll No.");
					$('#regfeed').html(" -> your current Reg No.");
					$('#levelfeed').html(" -> your current Level.");
					$('#deptfeed').html(" -> your current Dept.");
					$('#phonefeed').html(" -> your current Phone No.");
					
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
		var middle_name = $('[name="middle"]').val();
		var last_name = $('[name="last"]').val();
		var email = $('[name="email"]').val();
		var roll = $('[name="roll"]').val();
		var reg = $('[name="reg"]').val();
		var level = $('[name="level"]').val();
		var dept = $('[name="dept"]').val();
		var phone = $('[name="phone"]').val();
		var privacy = $('[name="privacy"]:checked').val();
		var captcha = $('[name="captcha"]').val();
			
		if
		(
			!first_name ||
			!middle_name ||
			!last_name ||
			!email ||
			!roll ||
			!reg ||
			!level ||
			!dept ||
			!phone ||
			!privacy ||
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
			dept &&
			phone &&
			privacy &&
			captcha 
		)
		{
			//$('#feedback').text('All values provided.');
			$.post('captcha/verify.php', {captcha: captcha}, function(return_data)
			{
				if(return_data == "Captcha correct")
				{
					//$('#feedback').text('All values provided.');
					$('[name="captcha"]').val("");
					$('[name="pass"]').val("");
					$('[name="pass_again"]').val("");
					$("#img1").remove();
					$('<img id="img1" src="captcha/captcha.php" />').appendTo("#imgdiv");
					//$('#feedback').text("captcha correct.");
					
					
					$.post('functions/updatestudent.php',
						{
							first_name: first_name,
							middle_name: middle_name,
							last_name: last_name,
							email: email,
							roll: roll,
							reg: reg,
							level: level,
							dept: dept,
							phone: phone,
							privacy: privacy
						},
						function(return_data)
						{
							//$('#feedback').html(return_data);
							if(return_data == true)
							{
								//$('#feedback').html(return_data);
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
	
	//dept validation starts.
	function validate_dept(dept)
	{
		$.post('functions/valid.php', {dept: dept}, function(data)
		{	
			$('#deptfeed').text(data);
		});
	}

	$('[name="dept"]').focusin(function()
	{
		if($('[name="dept"]').val() === '')
		{
			$('#deptfeed').text("Should be CSE or ECE only.");
		}
		else
		{
			validate_dept($('[name="dept"]').val());
		}
	}).blur(function()
	{
		$('#deptfeed').text('');
	}).keyup(function()
	{
		validate_dept($('[name="dept"]').val());
	});
	//dept validation ends.
	
});