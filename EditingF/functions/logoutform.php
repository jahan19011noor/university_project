<?php

	require '../core/init.php';
	
	$user = new Users();
	
	$user->logout();
	Session::flash('success');
	//Redirect::to('index.php');
	echo true;

?>