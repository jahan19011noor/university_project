<?php
	require_once '../core/init.php';
	
	if(Session::exists('users'))
	{
		echo Session::get('users');
	}
?>