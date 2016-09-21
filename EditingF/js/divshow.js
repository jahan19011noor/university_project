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