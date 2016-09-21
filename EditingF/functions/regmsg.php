<?php
	require_once '../core/init.php';
	
	if(Session::exists('register'))
	{
		if(Session::get('register'))
		{
			Session::flash('register');
			echo true;
		}
	}
	else if(!Session::exists('register'))
	{
		echo false;
	}
	else echo "";
?>