<?php
	require_once '../core/init.php';
	
	if(Session::exists('change'))
	{
		if(Session::get('change'))
		{
			Session::flash('change');
			echo true;
		}
	}
	else if(!Session::exists('change'))
	{
		echo false;
	}
	else echo "";
?>