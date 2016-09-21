$(document).ready(function()
{
	$.post('functions/infomsg.php',
	function(return_data)
	{
		if(return_data == true)
		{
			$('.display span a').html("Your Profile has been");
			$('#display li a').html("Successfully Changed!");
			$('.display').css("display", "block");
			$('#display').css("display", "block");
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
		else
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
	});
	
	$.post('functions/teachermsg.php',
	function(return_data)
	{
		if(return_data != "" && return_data != "Common Member")
		{
			$('.display span a').html("Sir, you have Permission");
			$('#display li a').html("As "+return_data);
			$('#left .display').css("display", "block");
			$('#left #display').css("display", "block").css("margin-bottom", "10px");
			$('#onlyLog .dropdown #afterreg').css("display", "none").addClass("last");
			$('#control_desk').removeClass('disappear');
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
			$('#control_desk').addClass('disappear');
		}
		else
		{
			//$('#main_body').html(return_data);
			$('.display').css("display", "none");
			$('#display').css("display", "none");
			$('#control_desk').addClass('disappear');
		}
	});
	
	$.post('functions/staffmsg.php',
	function(return_data)
	{
		if(return_data != "" && return_data != "Common Member")
		{
			$('.display span a').html("You have Permission");
			$('#display li a').html("As "+return_data);
			$('#left .display').css("display", "block");
			$('#left #display').css("display", "block").css("margin-bottom", "10px");
			$('#onlyLog .dropdown #afterreg').css("display", "none").addClass("last");
			$('#control_desk').addClass('disappear');
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
			$('#control_desk').addClass('disappear');
		}
		else
		{
			//$('#main_body').html(return_data);
			$('.display').css("display", "none");
			$('#display').css("display", "none");
			$('#control_desk').addClass('disappear');
		}
	});
	
	$.post('functions/studentmsg.php',
	function(return_data)
	{
		if(return_data != "" && return_data != "Common Member")
		{
			$('.display span a').html("You have Permission");
			$('#display li a').html("As "+return_data+" student");
			$('#left .display').css("display", "block");
			$('#left #display').css("display", "block").css("margin-bottom", "10px");
			$('#onlyLog .dropdown #afterreg').css("display", "none").addClass("last");
			$('#control_desk').addClass('disappear');
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
			$('#control_desk').addClass('disappear');
		}
		else
		{
			//$('#main_body').html(return_data);
			$('.display').css("display", "none");
			$('#display').css("display", "none");
			$('#control_desk').addClass('disappear');
		}
	});
	
	$.post('functions/teacherchangemsg.php',
	function(return_data)
	{
		if(return_data == true)
		{
			$('.display span a').html("Your Teacher Account Info");
			$('#display li a').html("Has been Successfully Changed!");
			$('#left .display').css("display", "block");
			$('#left #display').css("display", "block").css("margin-bottom", "10px");
			$('#onlyLog .dropdown #afterreg').css("display", "none").addClass("last");
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
		else
		{
			//$('#main_body').html(return_data);
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
	});
	
	$.post('functions/studentchangemsg.php',
	function(return_data)
	{
		if(return_data == true)
		{
			$('.display span a').html("Your Student Account Info");
			$('#display li a').html("Has been Successfully Changed!");
			$('#left .display').css("display", "block");
			$('#left #display').css("display", "block").css("margin-bottom", "10px");
			$('#onlyLog .dropdown #afterreg').css("display", "none").addClass("last");
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
		else
		{
			//$('#main_body').html(return_data);
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
	});
	
	$.post('functions/staffchangemsg.php',
	function(return_data)
	{
		if(return_data == true)
		{
			$('.display span a').html("Your Staff Account Info");
			$('#display li a').html("Has been Successfully Changed!");
			$('#left .display').css("display", "block");
			$('#left #display').css("display", "block").css("margin-bottom", "10px");
			$('#onlyLog .dropdown #afterreg').css("display", "none").addClass("last");
			$('#control_desk').css('display', 'block');
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
		else
		{
			//$('#main_body').html(return_data);
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
	});
	
	$.post('functions/regmsg.php',
	function(return_data)
	{
		if(return_data == true)
		{
			$('.display span a').html("Your Registration Status");
			$('#display li a').html("Successfully Registered!");
			$('.display').css("display", "block");
			$('#display').css("display", "block");
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
		else
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
	});
	
	$.post('functions/changemsg.php',
	function(return_data)
	{
		if(return_data == true)
		{
			$('.display span a').html("Your password has been");
			$('#display li a').html("Successfully Changed!");
			$('.display').css("display", "block");
			$('#display').css("display", "block");
		}
		else if(return_data == "")
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
		else
		{
			$('.display').css("display", "none");
			$('#display').css("display", "none");
		}
	});
	
	$.post('functions/cookiefind.php',
	function(return_data)
	{
		if(return_data)
		{
			$('#remove img').removeClass('disappear');
			$('#searching1').css('display', 'none');
			$("#sign").html(return_data).css('float', 'left').parent().closest('span').css('padding', '6px 9px 6px 9px');
			$("#logout").html('|Logout').css('display', 'block').css('font', 'bold 12px Tahoma').css('float', 'left');
			//$('#regstat .pannel li a').text(return_data);
			//$('#regstat').css('display', 'block');
		}
		else
		{
			$('#regstat').css('display', 'none');
		}
	});
	
	$.post('functions/signinmsg.php',
	function(return_data)
	{
		if(return_data)
		{
			$('#remove img').removeClass('disappear');
			$('#searching1').css('display', 'none');
			$("#sign").html('Hi, '+return_data).css('float', 'left').parent().closest('span').css('padding', '6px 9px 6px 9px');
			$("#logout").html('|Logout').css('display', 'block').css('font', 'bold 12px Tahoma').css('float', 'left');
			$('[name="viewprofile"] a').attr("href", "viewprofile.php");
			$('[name="editprofile"] a').attr("href", "editprofile.php");
			$('[name="viewresults"] a').attr("href", "viewresults.php");
			$('#onlyLog').css("display", "block");
			$('#afterreg').css("display", "block");
			
			//$('#regstat .pannel li a').text(return_data);
			//$('#regstat').css('display', 'block');
			
			$.post('functions/userimg.php',
			function(return_data)
			{
				if(return_data == 'female')
				{
					$('#img').attr("src", "images/female.jpg");
					$('#remover a').attr("href", "#");
				}
				else if(return_data == 'male')
				{
					$('#img').attr("src", "images/male.jpg");
					$('#remover a').attr("href", "#");
				}
				else
				{
					$('#img').attr("src", return_data);
					//$('#main_body').html(return_data);
					$('#remover a').attr("href", "#");
					$('#remover').css("display", "none");
				}
			});
		}
		else
		{
			$('#regstat').css('display', 'none');
			$('#onlyLog').css("display", "none");
			$('#img').attr("src", "images/logo.jpg");
			$('.hover').mousemove(function(e)
			{
				var object = "Please Sign in to activate!"
				$('#hoverdiv').text(object);
				
				$('#hoverdiv').css('top', (20 + e.clientY) + 'px').css('left', (10 + e.clientX) + 'px').css('display', 'block');
			}).mouseout(function()
			{
				$('#hoverdiv').hide();
			});
		}
	});
	
	$('#logout').click(function()
	{
		$.post('functions/logoutform.php',
		function(return_data)
		{
			$("#sign").html("Sign In");
			$("#logout").html('').css('display', 'none');
			$('#img').attr("src", "images/logo.jpg");
			$('#remover a').attr("href", "register.php");
			$('#remover').css("display", "block");
			$('[name="viewprofile"] a').attr("href", "##");
			$('[name="editprofile"] a').attr("href", "##");
			$('[name="viewresults"] a').attr("href", "##");
			$('#shower').addClass('disappear');
			//window.location = "index.php";
			var url = window.location.pathname;
			
			$('#regstat').css('display', 'none');
			$('#onlyLog').css("display", "none");
			$('#control_desk').addClass('disappear');
			$('#img').attr("src", "images/logo.jpg");
			$('.hover').mousemove(function(e)
			{
				var object = "Please Sign in to activate!"
				$('#hoverdiv').text(object);
				
				$('#hoverdiv').css('top', (20 + e.clientY) + 'px').css('left', (10 + e.clientX) + 'px').css('display', 'block');
			}).mouseout(function()
			{
				$('#hoverdiv').hide();
			});
			
			if
			(
				url == "/EditingF/viewprofile.php" ||
				url == "/EditingF/editprofile.php" ||
				url == "/EditingF/viewresults.php" ||
				url == "/EditingF/changepass.php" ||
				url == "/EditingF/imagechange.php" ||
				url == "/EditingF/teacheraccount.php" ||
				url == "/EditingF/studentaccount.php" ||
				url == "/EditingF/staffaccount.php" ||
				url == "/EditingF/teacher.php" ||
				url == "/EditingF/editteacheracc.php" ||
				url == "/EditingF/student.php" ||
				url == "/EditingF/editstudentacc.php" ||
				url == "/EditingF/staff.php" ||
				url == "/EditingF/editstaffacc.php" ||
				url == "/EditingF/studentimg.php" ||
				url == "/EditingF/teacherimg.php" ||
				url == "/EditingF/staffimg.php" ||
				url == "/EditingF/11result.php" ||
				url == "/EditingF/11sessional.php"
			)
			{
				window.location = "index.php";
			}
		});
	});
	
	$('.hover').click(function(event)
	{
		if($(this).attr("href") == "")
		{
			event.preventDefault();
			$('#sign').trigger('click');
		}
	});
	
});