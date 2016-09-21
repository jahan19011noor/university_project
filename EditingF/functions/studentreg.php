<?php
	require_once '../core/init.php';
	
	$feedback = '';
	
	//var_dump(Token::check(Input::get('token')));
		
	if(Input::exists())
	{
		if(Token::check(Input::get('token')))
		{
			//echo "found";
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
					'required' => true,
					'min' => 10,
					'max' => 50,
					'valid' => 'valid',
					'unique' => 'students'
				),
				'roll_no' => array
				(
					'name' => 'Roll No',
					'required' => true,
					'equal' => 5,
					'numeric' => true,
					'unique' => 'students'
				),
				'reg_no' => array
				(
					'name' => 'Reg No',
					'required' => true,
					'equal' => 9,
					'numeric' => true,
					'unique' => 'students'
				),
				'level' => array
				(
					'name' => 'Level',
					'max' => 3
				),
				'phone' => array
				(
					'name' => 'Phone No',
					'required' => true,
					'equal' => 11,
					'numeric' => true,
					'unique' => 'students'
				),
				'privacy' => array
				(
					'name' => 'Privacy',
					'required' => true
				),
				'dept' => array
				(
					'name' => 'Department',
					'required' => true
				)
			));
			
			if($validate->passed())
			{
				$register = new Users();
				$data = DB::singleton();
				$id = Session::get('users');
				$data = $data->get('users', array('id', '=', $id));
				
				$gender = $data->first()->gender;
				
				$image = "";
				
				try
				{
					$register->students(array
					(
						'user_id' => $id,
						'first_name' => Input::get('first_name'),
						'middle_name' => Input::get('middle_name'),
						'last_name' => Input::get('last_name'),
						'email' => Input::get('email'),
						'roll_no' => Input::get('roll_no'),
						'reg_no' => Input::get('reg_no'),
						'level' => Input::get('level'),
						'dept' => Input::get('dept'),
						'phone' => Input::get('phone'),
						'privacy' => Input::get('privacy'),
						'gender' => $gender,
						'image' => $image,
						'joined' => date('Y-m-d H:i:s')
					));
					
					$data = $data->get('groups', array('user_id', '=', $id));
					$group_id = $data->first()->id;
					
					$register->updategroup(array
					(
						'name' => 'Student',
						'permission' => Input::get('level')
					), $group_id);
					
					Session::put('student', 'Successfully registered!');
					echo true;
				}
				catch(Exception $e)
				{
					$x = $e->getMessage();
					Session::put('student', 'Successfully registered!');
					echo true;
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