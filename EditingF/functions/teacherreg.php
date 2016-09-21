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
					'unique' => 'teachers'
				),
				'teacher' => array
				(
					'name' => 'teacher',
					'required' => true
				),
				'phone' => array
				(
					'name' => 'Phone No',
					'required' => true,
					'equal' => 11,
					'numeric' => true,
					'unique' => 'teachers'
				),
				'privacy' => array
				(
					'name' => 'Privacy',
					'required' => true
				),
				'dept' => array
				(
					'name' => 'dept',
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
					$register->teachers(array
					(
						'user_id' => $id,
						'first_name' => Input::get('first_name'),
						'middle_name' => Input::get('middle_name'),
						'last_name' => Input::get('last_name'),
						'email' => Input::get('email'),
						'post' => Input::get('teacher'),
						'phone' => Input::get('phone'),
						'privacy' => Input::get('privacy'),
						'department' => Input::get('dept'),
						'gender' => $gender,
						'image' => $image,
						'joined' => date('Y-m-d H:i:s')
					));
					
					$data = $data->get('groups', array('user_id', '=', $id));
					$group_id = $data->first()->id;
					
					$register->updategroup(array
					(
						'name' => 'Teacher',
						'permission' => Input::get('teacher')
					), $group_id);
					
					Session::put('teacher', 'Successfully registered!');
					echo true;
				}
				catch(Exception $e)
				{
					$x = $e->getMessage();
					Session::put('teacher', 'Successfully registered!');
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