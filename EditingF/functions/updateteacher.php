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
			'middle_name' => array
			(
				'name' => 'Middle Name',
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
			'email' => array
			(
				'name' => 'Email',
				'min' => 10,
				'max' => 50,
				'valid' => 'valid'
			),
			'post' => array
			(
				'name' => 'Post',
				'required' => true
			),
			'phone' => array
			(
				'name' => 'Phone No',
				'required' => true,
				'equal' => 11,
				'numeric' => true
			),
			'dept' => array
			(
				'name' => 'Department',
				'required' => true,
				'equal_to' => "CSE, ECE"
			),
			'privacy' => array
				(
					'name' => 'Privacy',
					'required' => true
				)
		));
			
		if($validate->passed())
		{
			//echo "validated successfully.";
			$id = Session::get(Config::get('session/session_name'));
			$data = $data->get('teachers', array('user_id', '=', $id));
			$teacher_id = $data->first()->id;
			
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
								$user->updateteacher(array
								(
									'first_name' => Input::get('first_name')
								), $teacher_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;

					case "middle_name":
						if($datas == Input::get('middle_name'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('middle_name'))
						{
							try
							{
								$user->updateteacher(array
								(
									'middle_name' => Input::get('middle_name')
								), $teacher_id);
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
								$user->updateteacher(array
								(
									'last_name' => Input::get('last_name')
								), $teacher_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
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
							if($check_db->get('teachers', array('email', "=", Input::get('email')))->count())
							{
								$feedback .= "The Email already exists.";
							}
							else
							{
								try
								{
									$user->updateteacher(array
									(
										'email' => Input::get('email')
									), $teacher_id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "department":
						if($datas == Input::get('dept'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('dept'))
						{
							try
							{
								$user->updateteacher(array
								(
									'department' => Input::get('dept')
								), $teacher_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;
					case "post":
						if($datas == Input::get('post'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('post'))
						{
							try
							{
								$user->updateteacher(array
								(
									'post' => Input::get('post')
								), $teacher_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;
					case "phone":
						if($datas == Input::get('phone'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('phone'))
						{
							if($check_db->get('teachers', array('phone', "=", Input::get('phone')))->count())
							{
								$feedback .= "The Phone no already exists.";
							}
							else
							{
								try
								{
									$user->updateteacher(array
									(
										'phone' => Input::get('phone')
									), $teacher_id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "privacy":
						if($datas == Input::get('privacy'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('privacy'))
						{
							try
							{
								$user->updateteacher(array
								(
									'privacy' => Input::get('privacy')
								), $teacher_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
				}
			}
			if($feedback == "")
			{
				Session::put('teacher_change', 'Successfully Changed.');
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