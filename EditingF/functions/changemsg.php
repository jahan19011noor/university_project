<?php
	require_once '../core/init.php';
	
	if(Session::exists('pass'))
	{
		if(Session::get('pass'))
		{
			Session::flash('pass');
			echo true;
		}
	}
	else if(!Session::exists('pass'))
	{
		echo false;
	}
	else echo "";
?>