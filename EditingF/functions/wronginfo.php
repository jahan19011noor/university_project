<?php
	require_once '../core/init.php';
	
	if(Session::exists('wrong'))
	{
		echo Session::flash('wrong');
	}
	else if(Session::exists('right'))
	{
		echo Session::flash('right');
	}
	
?>