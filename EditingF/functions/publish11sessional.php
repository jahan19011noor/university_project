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
			'full_name' => array
			(
				'name' => 'Full Name',
				'required' => true,
				'min' => 8,
				'max' => 50
			),
			'roll_no' => array
			(
				'name' => 'Roll No',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'unique' => '11_result'
			),
			'session' => array
			(
				'name' => 'Session',
				'required' => true
			),
			'year' => array
			(
				'name' => 'Year',
				'required' => true
			),
			'cse_101' => array
			(
				'name' => 'CSE-101 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			),
			'cse_102' => array
			(
				'name' => 'CSE-102 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			),
			'phy_101' => array
			(
				'name' => 'PHY-101 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			),
			'mth_101' => array
			(
				'name' => 'MTH-101 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			),
			'ecn_101' => array
			(
				'name' => 'ECN-101 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			),
			'hum_101' => array
			(
				'name' => 'HUM-101 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			),
			'hum_111' => array
			(
				'name' => 'HUM-111 Sessional mark',
				'required' => true,
				'max' => 5,
				'numeric' => true,
				'smaller_than' => 50
			)
		));
			
		if($validate->passed())
		{
			//echo "validated successfully.";
			$register = new Users();
			$db = DB::singleton();
			
				try
				{
					$register->ffstudents(array
					(
						'full_name' => Input::get('full_name'),
						'roll_no' => Input::get('roll_no'),
						'level' => '1-1'
					));
					
					$register->ffresult(array
					(
						'full_name' => Input::get('full_name'),
						'roll_no' => Input::get('roll_no'),
						'session_year' => Input::get('session')." ".Input::get('year'),
						'cse_101_sessional' => Input::get('cse_101'),
						'cse_102_sessional' => Input::get('cse_102'),
						'phy_101_sessional' => Input::get('phy_101'),
						'mth_101_sessional' => Input::get('mth_101'),
						'ecn_101_sessional' => Input::get('ecn_101'),
						'hum_101_sessional' => Input::get('hum_101'),
						'hum_111_sessional' => Input::get('hum_111')
					));
					echo "sessional result successfully published.";
				}
				catch(Exception $e)
				{
					echo $x = $e->getMessage();
					//Session::put('register', 'Successfully registered!');
					//echo true;
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