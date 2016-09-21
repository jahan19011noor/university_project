<?php
	require_once '../core/init.php';
	
	$feedback = '';
	$x = '';
	
	if(Input::exists())
	{
		//echo "done";
		$validate = new Validation();
		$user = new Users();
		$data = DB::singleton();
		$check_db = DB::singleton();
		
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
				'min' => 4,
				'max' => 20
			),
			'email' => array
			(
				'name' => 'Email',
				'min' => 10,
				'max' => 50,
				'valid' => 'valid'
			)
		));
			
		if($validate->passed())
		{
			$id = Session::get(Config::get('session/session_name'));
			$data = $data->get('users', array('id', '=', $id));
			
			foreach($data->first() as $data_name => $datas)
			{
				switch($data_name)
				{
					case "first_name":
						if($datas == Input::get('first_name'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('first_name'))
						{
							try
							{
								$user->update(array
								(
									'first_name' => Input::get('first_name')
								), $id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;
					
					case "last_name":
						if($datas == Input::get('last_name'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('last_name'))
						{
							try
							{
								$user->update(array
								(
									'last_name' => Input::get('last_name')
								), $id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;
					case "username":
						if($datas == Input::get('username'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('username'))
						{
							if($check_db->get('users', array('username', "=", Input::get('username')))->count())
							{
								$feedback .= "The Username already exists<br>";
							}
							else
							{	
								try
								{
									$user->update(array
									(
										'username' => Input::get('username')
									), $id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "email":
						if($datas == Input::get('email'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('email'))
						{
							if($check_db->get('users', array('email', "=", Input::get('email')))->count())
							{
								$feedback .= "The Email already exists";
							}
							else
							{
								try
								{
									$user->update(array
									(
										'email' => Input::get('email')
									), $id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
				}
			}
			if($feedback == "")
			{
				Session::put('change', 'Successfully Changed.');
				echo true;
			}
			else if($feedback != "")
			{
				echo $feedback;
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
	
?>