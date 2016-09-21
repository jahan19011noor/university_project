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
				'numeric' => true
			),
			'cse_201' => array
			(
				'name' => 'CSE-201 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'cse_203' => array
			(
				'name' => 'CSE-203 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'cse_204' => array
			(
				'name' => 'CSE-204 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'cse_205' => array
			(
				'name' => 'CSE-205 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'cse_206' => array
			(
				'name' => 'CSE-206 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'mth_201' => array
			(
				'name' => 'MTH-201 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'ece_201' => array
			(
				'name' => 'ECE-201 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'ece_202' => array
			(
				'name' => 'ECE-202 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			)
		));
			
		if($validate->passed())
		{
			//echo "validated successfully.";
			$register = new Users();
			$db = DB::singleton();
			
				try
				{
					$register->sfstudents(array
					(
						'full_name' => Input::get('full_name'),
						'roll_no' => Input::get('roll_no'),
						'level' => '2-1'
					));
					
					$register->sfresult(array
					(
						'full_name' => Input::get('full_name'),
						'roll_no' => Input::get('roll_no'),
						'cse_201_sessional' => Input::get('cse_201'),
						'cse_203_sessional' => Input::get('cse_203'),
						'cse_204_sessional' => Input::get('cse_204'),
						'cse_205_sessional' => Input::get('cse_205'),
						'cse_206_sessional' => Input::get('cse_206'),
						'mth_201_sessional' => Input::get('mth_201'),
						'ece_201_sessional' => Input::get('ece_201'),
						'ece_202_sessional' => Input::get('ece_202')
					));
					echo "Sessional result successfully published.";
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