<?php
	require_once '../core/init.php';
	
	if(Session::exists('staff_change'))
	{
		if(Session::get('staff_change'))
		{
			Session::flash('staff_change');
			echo true;
		}
	}
	else if(!Session::exists('staff_change'))
	{
		echo false;
	}
	else echo "";
?>