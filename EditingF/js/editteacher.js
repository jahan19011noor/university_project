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
					
					$('[name="first"]').val(feedback[0]);
					$('[name="middle"]').val(feedback[1]);
					$('[name="last"]').val(feedback[2]);
					$('[name="email"]').val(feedback[3]);
					$('[name="dept"]').val(feedback[6]);
					$('[name="post"]').val(feedback[4]);
					$('[name="phone"]').val(feedback[5]);
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
					$('#firstfeed').html(" -> your current First Name.");
					$('#lastfeed').html(" -> your current Last Name.");
					$('#middlefeed').html(" -> your current Mid Name.");
					$('#emailfeed').html(" -> your current Email.");
					$('#deptfeed').html(" -> your current Dept.");
					$('#postfeed').html(" -> your current Post.");
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
		var dept = $('[name="dept"]').val();
		var post = $('[name="post"]').val();
		var phone = $('[name="phone"]').val();
		var privacy = $('[name="privacy"]:checked').val();
		var captcha = $('[name="captcha"]').val();
			
		if
		(
			!first_name ||
			!middle_name ||
			!last_name ||
			!email ||
			!dept ||
			!post ||
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
			dept &&
			post &&
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
					
					
					$.post('functions/updateteacher.php',
						{
							first_name: first_name,
							middle_name: middle_name,
							last_name: last_name,
							email: email,
							dept: dept,
							post: post,
							privacy: privacy,
							phone: phone
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
	
	//post validation starts.
	function validate_post(post1)
	{
		$.post('functions/valid.php', {post1: post1}, function(data)
		{	
			$('#postfeed').text(data);
		});
	}

	$('[name="post"]').focusin(function()
	{
		if($('[name="post"]').val() === '')
		{
			$('#postfeed').text("Choose Your Post");
		}
		else
		{
			validate_post($('[name="post"]').val());
		}
	}).blur(function()
	{
		$('#postfeed').text('');
	}).keyup(function()
	{
		validate_post($('[name="post"]').val());
	});
	//post validation ends.
	
});