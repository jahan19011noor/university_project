<?php
	require_once '../core/init.php';
	
	$feedback = '';
	
	//var_dump(Token::check(Input::get('token')));
		
	if(Input::exists())
	{
		if(Token::check(Input::get('token')))
		{
			$validate = new Validation();
			
			//have to declare object first
			//because class is not singleton
			//no method inside class to instantiate it
			//so have to instantiate before call
			//by creating object.
			//$validate = Validation::check() - wrong.
			
			//and again, the functions in the Validation class are not static
			//so cannot be used with creating an object. so again
			//$validate = Validation::check() - wrong.
			
			$validate->check($_POST, array
			(
				'first_name' => array
				(
					'name' => 'First Name',
					'required' => true,
					'min' => 4,
					'max' => 20
				),
				'last_name' => array
				(
					'name' => 'Last Name',
					'required' => true,
					'min' => 4,
					'max' => 20
				),
				'username' => array
				(
					'name' => 'Username',
					'required' => true,
					'min' => 4,
					'max' => 20,
					'unique' => 'users'
				),
				'email' => array
				(
					'name' => 'Email',
					'required' => true,
					'min' => 10,
					'max' => 50,
					'valid' => 'valid',
					'unique' => 'users'
				),
				'password' => array
				(
					'name' => 'Password',
					'required' => true,
					'min' => 6
				),
				'pass_again' => array
				(
					'name' => 'Confirmed Password',
					'required' => true,
					'matches' => 'password'
				),
				'gender' => array
				(
					'name' => 'gender',
					'required' => true
				)
			));
			
			if($validate->passed())
			{
				$register = new Users();
				$db = DB::singleton();
				$salt = Hash::salt(32);
				//die();
				//Session::put('success', 'Successfully registered!');
				try
				{
					$register->create(array
					(
						'first_name' => Input::get('first_name'),
						'last_name' => Input::get('last_name'),
						'username' => Input::get('username'),
						'email' => Input::get('email'),
						'password' => Hash::make(Input::get('password'), $salt),
						'gender' => Input::get('gender'),
						'salt' => $salt,
						'joined' => date('Y-m-d H:i:s'),
						'group' => 1
					));
					
					$db = $db->get('users', array('username', '=', Input::get('username')));
					$id = $db->first()->id;
					
					$register->groups(array
					(
						'user_id' => $id,
						'name' => 'Common Member',
						'permission' => 'Common Member'
					));
					
					Session::put('register', 'Successfully registered!');
					echo true;
				}
				catch(Exception $e)
				{
					$x = $e->getMessage();
					//Session::put('register', 'Successfully registered!');
					//echo true;
				}
			}
			else
			{
				//echo $validate->errors()[0];
				foreach($validate->errors() as $errors)
				{
					$feedback .= $errors.'<br>';
				}
				
				echo $feedback;
			}
		}
	}
?>