<?php
	require_once '../core/init.php';
	
	if(Session::exists('teacher_change'))
	{
		if(Session::get('teacher_change'))
		{
			Session::flash('teacher_change');
			echo true;
		}
	}
	else if(!Session::exists('teacher_change'))
	{
		echo false;
	}
	else echo "";
?>