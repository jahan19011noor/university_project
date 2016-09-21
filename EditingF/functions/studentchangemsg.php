<?php
	require_once '../core/init.php';
	
	if(Session::exists('student_change'))
	{
		if(Session::get('student_change'))
		{
			Session::flash('student_change');
			echo true;
		}
	}
	else if(!Session::exists('student_change'))
	{
		echo false;
	}
	else echo "";
?>