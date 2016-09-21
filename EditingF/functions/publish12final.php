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
			'cse_103' => array
			(
				'name' => 'CSE-103 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'cse_104' => array
			(
				'name' => 'CSE-104 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'mth_103' => array
			(
				'name' => 'MTH-103 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'phy_103' => array
			(
				'name' => 'PHY-103 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'phy_102' => array
			(
				'name' => 'PHY-102 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'ece_101' => array
			(
				'name' => 'ECE-101 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'ece_102' => array
			(
				'name' => 'ECE-102 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'hum_103' => array
			(
				'name' => 'HUM-103 result',
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
			$data = $data->get('12_result', array('roll_no', '=', Input::get('roll_no')));
			$id = $data->first()->id;
			
				try
				{
					$register->update12result(array
					(
						'cse_103_final' => Input::get('cse_103'),
						'cse_104_final' => Input::get('cse_104'),
						'mth_103_final' => Input::get('mth_103'),
						'phy_103_final' => Input::get('phy_103'),
						'phy_102_final' => Input::get('phy_102'),
						'ece_101_final' => Input::get('ece_101'),
						'ece_102_final' => Input::get('ece_102'),
						'hum_103_final' => Input::get('hum_103')
					), $id);
					echo "Final result successfully published.";
				}
				catch(Exception $e)
				{
					//echo $x = $e->getMessage();
					echo "Final result successfully published.";
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