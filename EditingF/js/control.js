$(document).ready(function()
{
	$.post('functions/control.php',
	function(return_data)
	{
		if(return_data == "no access")
		{
			$('#shower').addClass('disappear');
		}
		else if(return_data == "permitted")
		{
			$('#shower').removeClass('disappear');
		}
	});
});