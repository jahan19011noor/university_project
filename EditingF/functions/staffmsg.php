<?php
	require_once '../core/init.php';
	
	if(Session::exists('staff'))
	{
		if(Session::get('staff'))
		{
			$db = DB::singleton();
			$id = Session::get('users');
			$db = $db->get('groups', array('user_id', '=', $id));
			echo $db->first()->permission;
		}
	}
	else if(!Session::exists('staff'))
	{
		$db = DB::singleton();
		$id = Session::get('users');
		$db = $db->get('groups', array('user_id', '=', $id));
		echo $db->first()->permission;
	}
	else echo "";
?>