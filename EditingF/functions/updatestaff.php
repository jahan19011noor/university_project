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
			$data = $data->get('staffs', array('user_id', '=', $id));
			$staff_id = $data->first()->id;
			
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
								$user->updatestaff(array
								(
									'first_name' => Input::get('first_name')
								), $staff_id);
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
								$user->updatestaff(array
								(
									'middle_name' => Input::get('middle_name')
								), $staff_id);
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
								$user->updatestaff(array
								(
									'last_name' => Input::get('last_name')
								), $staff_id);
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
							if($check_db->get('staffs', array('email', "=", Input::get('email')))->count())
							{
								$feedback .= "The Email already exists.";
							}
							else
							{
								try
								{
									$user->updatestaff(array
									(
										'email' => Input::get('email')
									), $staff_id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "post":
						if($datas == Input::get('post'))
						{
							break;
						}
						else if($datas != Input::get('post'))
						{
							try
							{
								$user->updatestaff(array
								(
									'post' => Input::get('post')
								), $staff_id);
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
							if($check_db->get('staffs', array('phone', "=", Input::get('phone')))->count())
							{
								$feedback .= "The Phone no already exists.";
							}
							else
							{
								try
								{
									$user->updatestaff(array
									(
										'phone' => Input::get('phone')
									), $staff_id);
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
							break;
						}
						else if($datas != Input::get('privacy'))
						{
							try
							{
								$user->updatestaff(array
								(
									'privacy' => Input::get('privacy')
								), $staff_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;
				}
			}
			if($feedback == "")
			{
				Session::put('staff_change', 'Successfully Changed.');
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