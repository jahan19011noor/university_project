$(document).ready(function()
{
	$(':submit').click(function()
	{
		//alert('found');
		
		var post = $('[name="pic1text"]').val();
		var catagory = $('[name="level"]').val();
		//$('#feedbacker').text(post+' '+catagory);
		if
		(
			!post ||
			catagory == "Choose a Catagory"
		)
		{
			alert('found');
			$('#feedbacker').text('Please fill up the boxes!');
		}
		else if
		(
			post && 
			catagory != "Choose a Catagory"
		)
		{
			//alert('found');
			$.post('functions/validatehome.php',
			{
				post: post,
				catagory: catagory
			},
			function(return_data)
			{
				if(return_data == true)
				{
					window.location = "index.php";
				}
				else if(return_data == "")
				{
					$('#feedbacker').html("unsuccessful");	
				}
				else
				{
					$('#feedbacker').html(return_data);	
				}
			});
					
		}
		
		var lineHeight = $('#main_body').outerHeight();
		$('#line1').css('height', lineHeight);
		$('#line').css('height', lineHeight);
	});
	
});