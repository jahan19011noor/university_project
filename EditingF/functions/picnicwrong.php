<?php
	require_once '../core/init.php';
	
	if(Session::exists('imgwrong'))
	{
		echo Session::flash('imgwrong');
	}
	else if(Session::exists('imgright'))
	{
		echo Session::flash('imgright');
	}
	
?>