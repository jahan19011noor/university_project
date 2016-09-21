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
			'roll' => array
			(
				'name' => 'Roll No',
				'required' => true,
				'equal' => 5,
				'numeric' => true
			),
			'reg' => array
			(
				'name' => 'Reg No',
				'required' => true,
				'equal' => 9,
				'numeric' => true
			),
			'level' => array
			(
				'name' => 'Level',
				'required' => true,
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
				'required' => true
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
			$data = $data->get('students', array('user_id', '=', $id));
			$student_id = $data->first()->id;
			
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
								$user->updatestudent(array
								(
									'first_name' => Input::get('first_name')
								), $student_id);
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
								$user->updatestudent(array
								(
									'middle_name' => Input::get('middle_name')
								), $student_id);
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
								$user->updatestudent(array
								(
									'last_name' => Input::get('last_name')
								), $student_id);
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
							if($check_db->get('students', array('email', "=", Input::get('email')))->count())
							{
								$feedback .= "The Email already exists.";
							}
							else
							{
								try
								{
									$user->updatestudent(array
									(
										'email' => Input::get('email')
									), $student_id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "roll_no":
						if($datas == Input::get('roll'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('roll'))
						{
							if($check_db->get('students', array('roll_no', "=", Input::get('roll')))->count())
							{
								$feedback .= "The Roll no already exists.";
							}
							else
							{
								try
								{
									$user->updatestudent(array
									(
										'roll_no' => Input::get('roll')
									), $student_id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "reg_no":
						if($datas == Input::get('reg'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('reg'))
						{
							if($check_db->get('students', array('reg_no', "=", Input::get('reg')))->count())
							{
								$feedback .= "The Reg no already exists.";
							}
							else
							{
								try
								{
									$user->updatestudent(array
									(
										'reg_no' => Input::get('reg')
									), $student_id);
								}
								catch(Exception $e)
								{
									$x .= $e->getMessage();
								}
							}
						}
						break;
					case "level":
						if($datas == Input::get('level'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('level'))
						{
							try
							{
								$user->updatestudent(array
								(
									'level' => Input::get('level')
								), $student_id);
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
						break;
					case "dept":
						if($datas == Input::get('dept'))
						{
							//$feedback .= " they are the same.";
							break;
						}
						else if($datas != Input::get('dept'))
						{
							try
							{
								$user->updatestudent(array
								(
									'dept' => Input::get('dept')
								), $student_id);
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
							if($check_db->get('students', array('phone', "=", Input::get('phone')))->count())
							{
								$feedback .= "The Phone no already exists.";
							}
							else
							{
								try
								{
									$user->updatestudent(array
									(
										'phone' => Input::get('phone')
									), $student_id);
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
								$user->updatestudent(array
								(
									'privacy' => Input::get('privacy')
								), $student_id);
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
				Session::put('student_change', 'Successfully Changed.');
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