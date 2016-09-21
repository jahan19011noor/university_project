$(document).ready(function()
{
	var token1 = "";
	$('#sign').click(function()
	{
		//$('[name="token1"]').val("");
		//$('#token1').val('displayed').css('display', 'block');
		//token1 = $('[name="token1"]').val();
		//$('[name="token1"]').val("");
		$.post('functions/token.php', {token1: token1},
		function(return_data)
		{
			$('#token1').val(return_data).css('display', 'block');
			//$('#token1').val(return_data);
			//token1 = return_data;
		});
		
		//$('#main_body').html(token1);
		
			var text = $(this).html();
			if(text == 'Sign In')
			{
				$('#remove img').addClass('disappear');
				$('#searching1').css('display', 'block');
				$(this).html("Later");
				$("#feeder").html("Please Sign In!").css('display', 'block');
				$('#username').val("");
				$('#password').val("");
				$('#remember').attr("checked", false);
				$(".submit5 #submit1").css("display", "none");
			}
			else if(text == "Later")
			{
				$('#remove img').removeClass('disappear');
				$('#searching1').css('display', 'none');
				$(this).html("Sign In");
				$("#feeder").html("").css('display', 'none');
				$('#username').val("");
				$('#password').val("");
				$('#remember').attr("checked", false);
			}
	});
	
	//$(".submit5 #submit1").val("foundit");
	
	$('[name="submit"]').click(function()
	{
		//$("#feeder").css('display', 'block');
		var username = $('#username').val();
		var password = $('#password').val();
		var token1 = $('#token1').val();
		//$(".submit5 #submit1").val("foundit");
		//$("#feeder").html("");
		//$("#feeder").val(token1);
		//$("#feeder").html(username+" "+password+" "+remember).css('display', 'block');
		
		if
		(
			!username ||
			!password
		)
		{
			$("#feeder").html("");
			$("#feeder").html("Please fill up the form.").css('display', 'block');
			$('#username').val("");
			$('#password').val("");
			$('#remember').attr("checked", false);
			//$(".submit5 #submit1").val("foundit");
		}
		else if
		(
			username &&
			password
		)
		{
			//$("#feeder").html("");
			//$("#feeder").html("both are there");
			//$(".submit5 #submit1").val("foundit");
			if($('#remember').is(':checked'))
			{
				//var remember = $('#remember').attr('checked');
				//$(".submit5 #submit1").val("foundit");
				$.post('functions/loginform.php',
				{
					username: username,
					password: password,
					remember: "on",
					token: token1
				},
				function(return_data)
				{
					//$(".submit5 #submit1").val("foundit");
					if(return_data == true)
					{
						//$("#feeder").html("successful").css("display", "block");
						window.location = "index.php";
					}
					/*else if(return_data == "unsuccessful")
					{
						$("#feeder").html(return_data).css("display", "block");
					}
					else
					{
						$("#feeder").html(return_data).css("display", "block");
					}
					*/else 
					{
						if(return_data != '')
						{
							$('#feeder').html(return_data).css('display', 'block');
							$('#username').val("");
							$('#password').val("");
							$('#remember').attr("checked", false);
							//$(".submit5 #submit1").css("display", "block");
							//$(".submit5").css("display", "none");
							//$('[name="submit5"]').val("submit5");
							//$('[name="submit5"]').val("disappear");
							if(return_data == "Invalid Password!")
							{
								$(".submit5 #submit1").css("display", "block");
							}
							else if(return_data == "Username does not exist.")
							{
								$(".submit5 #submit1").css("display", "none");
							}
						}
						else if(return_data != true)
						{
							$('#feeder').html("Invalid Entry!").css('display', 'block');
							$('#username').val("");
							$('#password').val("");
							$('#remember').attr("checked", false);
							$(".submit5 #submit1").css("display", "none");
						}
					}
				});
			}
			else
			{
				$.post('functions/loginform.php',
				{
					username: username,
					password: password,
					remember: "off",
					token: token1
				},
				function(return_data)
				{
					if(return_data == true)
					{
						//$("#feeder").html("successful").css("display", "block");
						window.location = "index.php";
					}
					/*else if(return_data == "unsuccessful")
					{
						$("#feeder").html(return_data).css("display", "block");
					}
					else
					{
						$("#feeder").html(return_data).css("display", "block");
					}
					*/else 
					{
						if(return_data != '')
						{
							$('#feeder').html(return_data).css('display', 'block');
							$('#username').val("");
							$('#password').val("");
							$('#remember').attr("checked", false);
							$(".submit5 #submit1").css("display", "block");
							if(return_data == "Invalid Password!")
							{
								$(".submit5 #submit1").css("display", "block");
							}
							else if(return_data == "Username does not exist.")
							{
								$(".submit5 #submit1").css("display", "none");
							}
						}
						else if(return_data != true)
						{
							$('#feeder').html("Invalid Entry!").css('display', 'block');
							$('#username').val("");
							$('#password').val("");
							$('#remember').attr("checked", false);
							$(".submit5 #submit1").css("display", "none");
						}
					}
				});
			}
			
		}
		
		$(".submit5 #submit1").click(function()
		{
			window.location = "changepass.php";
		});
		
	});
});