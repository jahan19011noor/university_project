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
					'unique' => 'staffs'
				),
				'post' => array
				(
					'name' => 'Post',
					'max' => 15
				),
				'phone' => array
				(
					'name' => 'Phone No',
					'required' => true,
					'equal' => 11,
					'numeric' => true,
					'unique' => 'staffs'
				),
				'privacy' => array
				(
					'name' => 'Privacy',
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
					$register->staffs(array
					(
						'user_id' => $id,
						'first_name' => Input::get('first_name'),
						'middle_name' => Input::get('middle_name'),
						'last_name' => Input::get('last_name'),
						'email' => Input::get('email'),
						'post' => Input::get('post'),
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
						'name' => 'Staff',
						'permission' => Input::get('post')
					), $group_id);
					
					Session::put('staff', 'Successfully registered!');
					echo true;
				}
				catch(Exception $e)
				{
					$x = $e->getMessage();
					Session::put('staff', 'Successfully registered!');
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