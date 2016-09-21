<?php
	require_once '../core/init.php';
	
	$feedback = '';
		
	if(Input::exists())
	{
		$validate = new Validation();
			
			$validate->check($_POST, array
			(
				'post' => array
				(
					'name' => 'Post',
					'required' => true
				),
				'catagory' => array
				(
					'name' => 'Catagory',
					'required' => true
				)
			));
			
			if($validate->passed())
			{
				$register = new Users();
				//die();
				//Session::put('success', 'Successfully registered!');
				try
				{
					$register->post(array
					(
						'catagory' => Input::get('catagory'),
						'text' => Input::get('post'),
						'posted_on' => date('Y-m-d H:i:s')
					));
					
					//Session::put('register', 'Successfully registered!');
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
?>