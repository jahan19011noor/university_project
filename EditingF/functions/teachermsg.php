<?php
	require_once '../core/init.php';
	
	if(Session::exists('teacher'))
	{
		if(Session::get('teacher'))
		{
			$db = DB::singleton();
			$id = Session::get('users');
			$db = $db->get('groups', array('user_id', '=', $id));
			echo $db->first()->permission;
		}
	}
	else if(!Session::exists('teacher'))
	{
		$db = DB::singleton();
		$id = Session::get('users');
		$db = $db->get('groups', array('user_id', '=', $id));
		echo $db->first()->permission;
	}
	else echo "";
?>