$(document).ready(function()
{
	var token = "";
	var feedback = "";
	
	$.post('functions/token.php', {token: token},
	function(return_data)
	{
		$('#token').html(return_data);
		token = return_data;
	});
	
	//$('#feedback').html('I found it');
	
	$.post('functions/11courses.php', {},
	function(return_data)
	{
		if(return_data)
		{
			//alert('I fount it.');
			feedback = return_data.split(", ");
			
			$('#diva h1').html(feedback[0]);
			$('#diva').css('display', 'block');
			
			$('#divb h1').html(feedback[1]);
			$('#divb').css('display', 'block');
			
			$('#divc h1').html(feedback[2]);
			$('#divc').css('display', 'block');
			
			$('#divd h1').html(feedback[3]);
			$('#divd').css('display', 'block');
			
			$('#dive h1').html(feedback[4]);
			$('#dive').css('display', 'block');
			
			$('#divf h1').html(feedback[5]);
			$('#divf').css('display', 'block');
			
			$('#divg h1').html(feedback[6]);
			$('#divg').css('display', 'block');
			
			var lineHeight = $('#main_body').outerHeight();
			$('#line1').css('height', lineHeight);
			$('#line').css('height', lineHeight);
		}
	});
	
	$(':button').click(function()
	{
		var full_name = $('[name="first"]').val();
		var roll_no = $('[name="last"]').val();
		var session = $('[name="level"]').val();
		var year = $('[name="level1"]').val();
		var cse_101 = $('[name="last1"]').val();
		var cse_102 = $('[name="last2"]').val();
		var phy_101 = $('[name="last3"]').val();
		var mth_101 = $('[name="last4"]').val();
		var ecn_101 = $('[name="last5"]').val();
		var hum_101 = $('[name="last6"]').val();
		var hum_111 = $('[name="last7"]').val();
			
		if
		(
			!full_name ||
			!roll_no ||
			!session ||
			!year ||
			!cse_101 ||
			!cse_102 ||
			!phy_101 ||
			!mth_101 ||
			!ecn_101 ||
			!hum_101 ||
			!hum_111
		)
		{
			$('#feedback').text('Please fill in all the fields!');
			$('[name="captcha"]').val("");
		}
		else if
		(
			full_name &&
			roll_no &&
			session &&
			year &&
			cse_101 &&
			cse_102 &&
			phy_101 &&
			mth_101 &&
			ecn_101 &&
			hum_101 &&
			hum_111
		)
		{
				var session_year = session + " " + year;
				$.post('functions/publish11final.php',
						{
							full_name: full_name,
							roll_no: roll_no,
							session_year: session_year,
							cse_101: cse_101,
							cse_102: cse_102,
							phy_101: phy_101,
							mth_101: mth_101,
							ecn_101: ecn_101,
							hum_101: hum_101,
							hum_111: hum_111
						},
						function(return_data)
						{
							if(return_data == true)
							{
								//window.location = "index.php";
							}
							else if(return_data == "")
							{
								$('#feedback').html("unsuccessful");	
							}
							else
							{
								var full_name = $('[name="first"]').val("");
								var roll_no = $('[name="last"]').val("");
								var cse_101 = $('[name="last1"]').val("");
								var cse_102 = $('[name="last2"]').val("");
								var phy_101 = $('[name="last3"]').val("");
								var mth_101 = $('[name="last4"]').val("");
								var ecn_101 = $('[name="last5"]').val("");
								var hum_101 = $('[name="last6"]').val("");
								var hum_111 = $('[name="last7"]').val("");
								$('#feedback').html(return_data);	
							}
						});
		}
	});
	
	//first_name validation starts.
	function validate_full_name(full_name)
	{
		$.post('functions/valid.php', {full_name: full_name}, function(data)
		{	
			$('#firstfeed').text(data);
		});
	}

	$('[name="first"]').focusin(function()
	{
		if($('[name="first"]').val() === '')
		{
			$('#firstfeed').text("At least 8 characters.");
		}
		else
		{
			validate_full_name($('[name="first"]').val());
		}
	}).blur(function()
	{
		$('#firstfeed').text('');
	}).keyup(function()
	{
		validate_full_name($('[name="first"]').val());
	});
	//first_name validation ends.
	
	//roll_no validation starts.
	function validate_roll_no(roll)
	{
		$.post('functions/valid.php', {roll: roll}, function(data)
		{	
			$('#lastfeed').text(data);
		});
	}

	$('[name="last"]').focusin(function()
	{
		if($('[name="last"]').val() === '')
		{
			$('#lastfeed').text("Should be 5 digits.");
		}
		else
		{
			validate_roll_no($('[name="last"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed').text('');
	}).keyup(function()
	{
		validate_roll_no($('[name="last"]').val());
	});
	//roll_no validation ends.
	
	//marks validation starts.
	function validate_marks1(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed1').text(data);
		});
	}

	$('[name="last1"]').focusin(function()
	{
		if($('[name="last1"]').val() === '')
		{
			$('#lastfeed1').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks1($('[name="last1"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed1').text('');
	}).keyup(function()
	{
		validate_marks1($('[name="last1"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks2(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed2').text(data);
		});
	}

	$('[name="last2"]').focusin(function()
	{
		if($('[name="last2"]').val() === '')
		{
			$('#lastfeed2').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks2($('[name="last2"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed2').text('');
	}).keyup(function()
	{
		validate_marks2($('[name="last2"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks3(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed3').text(data);
		});
	}

	$('[name="last3"]').focusin(function()
	{
		if($('[name="last3"]').val() === '')
		{
			$('#lastfeed3').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks3($('[name="last3"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed3').text('');
	}).keyup(function()
	{
		validate_marks3($('[name="last3"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks4(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed4').text(data);
		});
	}

	$('[name="last4"]').focusin(function()
	{
		if($('[name="last4"]').val() === '')
		{
			$('#lastfeed4').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks4($('[name="last4"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed4').text('');
	}).keyup(function()
	{
		validate_marks4($('[name="last4"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks5(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed5').text(data);
		});
	}

	$('[name="last5"]').focusin(function()
	{
		if($('[name="last5"]').val() === '')
		{
			$('#lastfeed5').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks5($('[name="last5"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed5').text('');
	}).keyup(function()
	{
		validate_marks5($('[name="last5"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks6(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed6').text(data);
		});
	}

	$('[name="last6"]').focusin(function()
	{
		if($('[name="last6"]').val() === '')
		{
			$('#lastfeed6').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks6($('[name="last6"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed6').text('');
	}).keyup(function()
	{
		validate_marks6($('[name="last6"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks7(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed7').text(data);
		});
	}

	$('[name="last7"]').focusin(function()
	{
		if($('[name="last7"]').val() === '')
		{
			$('#lastfeed7').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks7($('[name="last7"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed7').text('');
	}).keyup(function()
	{
		validate_marks7($('[name="last7"]').val());
	});
	//marks validation ends.
	
});