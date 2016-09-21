<?php
	require_once '../core/init.php';
	
	if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name')))
	{
		//echo 'the user asked to be remembered';
		
		$hash = Cookie::get(Config::get('remember/cookie_name'));
		
		$hashCheck = DB::singleton()->get('users_session', array('hash', '=', $hash));
		//echo $hashCheck->first()->user_id;
		
		if($hashCheck->count())
		{
			//echo 'cookie found, log the user in.';
			if($user = new Users/*($hashCheck->first()->user_id)*/)
			{
				$user->login($hashCheck->first()->user_id);
				if(Session::exists('users'))
				{
					//echo 'Hi, '.Session::get('users');
					$user_name = DB::singleton();
					$user_name = $user_name->get('users', array('id', '=', Session::get('users')));
					$username = $user_name->first()->username;
					echo "Hi, ".$username;
				}
			}
		}
	}
	else if(!Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name')))
	{
		return false;
	}

?>