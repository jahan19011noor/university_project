$(document).ready(function()
{
	//alert("function not reached.");
	$.post('functions/viewpicnic.php',
	{},
	function(return_data)
	{
		//alert("function reached.");
		if(return_data)
		{
			//alert("data returned.");
			feedback = return_data.split(", ");
						
				
				$('#image1 img').attr("src", feedback[0]);
				$('#imagefeed1').val(feedback[1]);
				$('#image2 img').attr("src", feedback[2]);
				$('#imagefeed2').val(feedback[3]);
				$('#image3 img').attr("src", feedback[4]);
				$('#imagefeed3').val(feedback[5]);
		}
		var lineHeight = $('#main_body').outerHeight();
		$('#line1').css('height', lineHeight);
		$('#line').css('height', lineHeight);
	});
	
	$('[name="submit1"]').click(function()
	{
		$('[name="file1"]').trigger('click');
		{
			$('[name="file1"]').bind('change', function()
			{
				ext = this.value.match(/\.(.+)$/)[1];
				size = this.files[0].size;
				file = $(this).val();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
				{
					$('#filefeed1').html("File type is invalid.");
				}
				else if(size > 2097152)
				{
					$('#filefeed1').html("File should be maximum 2mb in size.");
				}
				else
				{
					$('#filefeed1').html(file+" - File successfully chosen.");
					$('#img1feed').html("Give a new image description.");
				}
			});
		}
	});
	
	$('[name="submit2"]').click(function()
	{
		$('[name="file2"]').trigger('click');
		{
			$('[name="file2"]').bind('change', function()
			{
				ext = this.value.match(/\.(.+)$/)[1];
				size = this.files[0].size;
				file = $(this).val();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
				{
					$('#filefeed2').html("File type is invalid.");
				}
				else if(size > 2097152)
				{
					$('#filefeed2').html("File should be maximum 2mb in size.");
				}
				else
				{
					$('#filefeed2').html(file+" - File successfully chosen.");
					$('#img2feed').html("Give a new image description.");
				}
			});
		}
	});
	
	$('[name="submit3"]').click(function()
	{
		$('[name="file3"]').trigger('click');
		{
			$('[name="file3"]').bind('change', function()
			{
				ext = this.value.match(/\.(.+)$/)[1];
				size = this.files[0].size;
				file = $(this).val();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
				{
					$('#filefeed3').html("File type is invalid.");
				}
				else if(size > 2097152)
				{
					$('#filefeed3').html("File should be maximum 2mb in size.");
				}
				else
				{
					$('#filefeed3').html(file+" - File successfully chosen.");
					$('#img3feed').html("Give a new image description.");
				}
			});
		}
	});
	
	var lineHeight = $('#main_body').outerHeight();
	$('#line1').css('height', lineHeight);
	$('#line').css('height', lineHeight);
	
	$.post('functions/picnicwrong.php',
	function(return_data)
	{
		if(return_data != "" && return_data != false)
		{
			$('#feedback1').html(return_data);
			$('#feedback2').html(return_data);
			$('#feedback3').html(return_data);
		}
	});
	
});