<?php
	require_once '../core/init.php';
	
	$feedback = '';

	if(Input::exists())
	{
		if(Token::check(Input::get('token')))
		{
			$validate = new Validation();
			
			$validate->check($_POST, array
			(
				'username' => array
				(
					'required' => true,
					'name' => 'Username',
					'exists' => 'users'
				),
				'password' => array
				(
					'required' => true,
					'name' => 'Password'
				)
			));
			
			if($validate->passed())
			{
				$login = new Users();
				
				$remember = (Input::get('remember') === 'on') ? true : false;
				
				try
				{
					$login->login(Input::get('username'), Input::get('password'), $remember);

					Session::put('success', /*'Hi, '.*/$login->data()->username);
					//Redirect::to('index.php');
					echo true;
					
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
			}
			else
			{
				/*foreach($validate->errors() as $errors)
				{
					echo '<p>'.$errors.'</p>';
				}*/
				foreach($validate->errors() as $errors)
				{
					$feedback .= $errors.'<br>';
				}
				
				echo $feedback;
			}
		}
	}
?>