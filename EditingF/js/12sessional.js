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
	
	$.post('functions/12courses.php', {},
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
			
			$('#divh h1').html(feedback[7]);
			$('#divh').css('display', 'block');
			
			var lineHeight = $('#main_body').outerHeight();
			$('#line1').css('height', lineHeight);
			$('#line').css('height', lineHeight);
		}
	});
	
	$(':button').click(function()
	{
		var full_name = $('[name="first"]').val();
		var roll_no = $('[name="last"]').val();
		var cse_103 = $('[name="last1"]').val();
		var cse_104 = $('[name="last2"]').val();
		var mth_103 = $('[name="last3"]').val();
		var phy_103 = $('[name="last4"]').val();
		var phy_102 = $('[name="last5"]').val();
		var ece_101 = $('[name="last6"]').val();
		var ece_102 = $('[name="last7"]').val();
		var hum_103 = $('[name="last8"]').val();
			
		if
		(
			!full_name ||
			!roll_no ||
			!cse_103 ||
			!cse_104 ||
			!mth_103 ||
			!phy_103 ||
			!phy_102 ||
			!ece_101 ||
			!ece_102 ||
			!hum_103 
		)
		{
			$('#feedback').text('Please fill in all the fields!');
			$('[name="captcha"]').val("");
		}
		else if
		(
			full_name &&
			roll_no &&
			cse_103 &&
			cse_104 &&
			mth_103 &&
			phy_103 &&
			phy_102 &&
			ece_101 &&
			ece_102 &&
			hum_103 
		)
		{
				$.post('functions/publish12sessional.php',
						{
							full_name : full_name,
							roll_no : roll_no,
							cse_103 : cse_103,
							cse_104 : cse_104,
							mth_103 : mth_103,
							phy_103 : phy_103,
							phy_102 : phy_102,
							ece_101 : ece_101,
							ece_102 : ece_102,
							hum_103 : hum_103
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
								var cse_103 = $('[name="last1"]').val("");
								var cse_104 = $('[name="last2"]').val("");
								var mth_103 = $('[name="last3"]').val("");
								var phy_103 = $('[name="last4"]').val("");
								var phy_102 = $('[name="last5"]').val("");
								var ece_101 = $('[name="last6"]').val("");
								var ece_102 = $('[name="last7"]').val("");
								var hum_103 = $('[name="last8"]').val("");
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
	function validate_marks(num)
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
			validate_marks($('[name="last1"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed1').text('');
	}).keyup(function()
	{
		validate_marks($('[name="last1"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks7(num)
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
			validate_marks7($('[name="last2"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed2').text('');
	}).keyup(function()
	{
		validate_marks7($('[name="last2"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks6(num)
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
			validate_marks6($('[name="last3"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed3').text('');
	}).keyup(function()
	{
		validate_marks6($('[name="last3"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks5(num)
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
			validate_marks5($('[name="last4"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed4').text('');
	}).keyup(function()
	{
		validate_marks5($('[name="last4"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks4(num)
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
			validate_marks4($('[name="last5"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed5').text('');
	}).keyup(function()
	{
		validate_marks4($('[name="last5"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks3(num)
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
			validate_marks3($('[name="last6"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed6').text('');
	}).keyup(function()
	{
		validate_marks3($('[name="last6"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks2(num)
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
			validate_marks2($('[name="last7"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed7').text('');
	}).keyup(function()
	{
		validate_marks2($('[name="last7"]').val());
	});
	//marks validation ends.
	
	//marks validation starts.
	function validate_marks1(num)
	{
		$.post('functions/valid.php', {num: num}, function(data)
		{	
			$('#lastfeed8').text(data);
		});
	}

	$('[name="last8"]').focusin(function()
	{
		if($('[name="last8"]').val() === '')
		{
			$('#lastfeed8').text("Should be within 5 digits.");
		}
		else
		{
			validate_marks1($('[name="last8"]').val());
		}
	}).blur(function()
	{
		$('#lastfeed8').text('');
	}).keyup(function()
	{
		validate_marks1($('[name="last8"]').val());
	});
	//marks validation ends.
	
});