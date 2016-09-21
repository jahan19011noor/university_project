<?php
	require_once '../core/init.php';
	
	$gender = DB::singleton();
	$gender = $gender->get('users', array('id', '=', Session::get('users')));
	if($gender->first()->image == "")
	{
		$image = $gender->first()->gender;
	}
	else if($gender->first()->image !== "")
	{
		$image = $gender->first()->image;
	}
	//$gender = $gender->first()->gender;
	
	echo $image;
?>