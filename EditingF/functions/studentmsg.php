<?php
	require_once '../core/init.php';
	
	if(Session::exists('student'))
	{
		if(Session::get('student'))
		{
			$db = DB::singleton();
			$id = Session::get('users');
			$db = $db->get('groups', array('user_id', '=', $id));
			echo $db->first()->permission;
		}
	}
	else if(!Session::exists('student'))
	{
		$db = DB::singleton();
		$id = Session::get('users');
		$db = $db->get('groups', array('user_id', '=', $id));
		echo $db->first()->permission;
	}
	else echo "";
?>