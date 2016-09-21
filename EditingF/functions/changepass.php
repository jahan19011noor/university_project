<?php
	require_once '../core/init.php';
	
	$feedback = '';
		
	if(Input::exists())
	{
		if(Token::check(Input::get('token')))
		{
			$validate = new Validation();
			$user = new Users();
			$data = DB::singleton();
			
			$validate->check($_POST, array
			(
				'username' => array
				(
					'name' => 'Username',
					'required' => true,
					'min' => 4,
					'max' => 20,
					'found' => 'users'
				),
				'email' => array
				(
					'name' => 'Email',
					'required' => true,
					'min' => 10,
					'max' => 50,
					'valid' => 'valid',
					'found' => 'users'
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
				)
			));
			
			if($validate->passed())
			{
				$db_data = $data->get('users', array('username', '=', Input::get('username')));
				$password = $db_data->first()->password;
				$salt = $db_data->first()->salt;
				$new_pass = Hash::make(Input::get('password'), $salt);
				//echo $password."<br>".$new_pass;
				if($password === $new_pass)
				{
					echo "Your new password should not match old one.";
				}
				else if($password !== $new_pass)
				{
					//echo "passwords do not match.";
					$salt = Hash::salt(32);
					$password = Hash::make(Input::get('password'), $salt);
					$id = $db_data->first()->id;
					try
					{
						$user->update(array
						(
							'password' => $password,
							'salt' => $salt
						), $id);
					}
					catch(Exception $e)
					{
						$x = $e->getMessage();
						Session::put('pass', 'You have successfully changed your password');
						echo true;
					}
				}
			}
			else
			{
				foreach($validate->errors() as $errors)
				{
					$feedback .= $errors.'<br>';
				}
				
				echo $feedback;
			}
		}
	}
?>