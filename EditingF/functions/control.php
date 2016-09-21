<?php
	require_once '../core/init.php';
	
	if(Session::exists('users'))
	{
		$db = DB::singleton();
		$id = Session::get('users');
		$db = $db->get('groups', array('user_id', '=', $id));
		$control = $db->first()->permission;
		if($control == "Common Member")
		{
			echo "no access";
		}
		else echo "permitted";
	}
	else
	{
		echo "no access";
	}
?>