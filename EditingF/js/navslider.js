$(document).ready(function()
{
	$('.buttons li').find('ul li a').css('color', 'white');
	$('.buttons li').hover(function()
	{
		clearTimeout($.data(this, 'timer'));
		$(this).find('a').css('color', 'rgb(14, 114, 122)');
		$(this).find('ul li a').css('color', 'white');
		//$(this).find('ul').stop(true, true).slideDown(200);
	}, function()
	{
		$.data(this, 'timer', setTimeout($.proxy(function()
		{
			$(this).find('a').css('color', 'white');
			//$(this).find('ul').stop(true, true).slideUp(200);
		}, this), 0))
	});
});
