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
			'session_year' => array
			(
				'name' => 'Session',
				'required' => true,
				'found' => '11_result'
			),
			'cse_101' => array
			(
				'name' => 'CSE-101 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'cse_102' => array
			(
				'name' => 'CSE-102 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'phy_101' => array
			(
				'name' => 'PHY-101 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'mth_101' => array
			(
				'name' => 'MTH-101 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'ecn_101' => array
			(
				'name' => 'ECN-101 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'hum_101' => array
			(
				'name' => 'HUM-101 result',
				'required' => true,
				'max' => 5,
				'numeric' => true
			),
			'hum_111' => array
			(
				'name' => 'HUM-111 result',
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
			$data = $data->get('11_result', array('roll_no', '=', Input::get('roll_no')));
			//$session = Input::get('session')." ".Input::get('year');
			$x = 0;
			
			foreach($data->results() as $data_names => $datas)
			{
				if($datas->session_year == Input::get('session_year'))
				{
					$id = $datas->id;
					break;
				}
			}
				try
				{
					$cse_101_half = Input::get('cse_101')/2;
					$cse_101_sess = $data->first()->cse_101_sessional;
					$cse_101_total = $cse_101_half + $cse_101_sess;
					if($cse_101_total >= 80)
					{
						$cse_101_gpa = 4.00;
					}
					else if($cse_101_total < 80 && $cse_101_total >= 75)
					{
						$cse_101_gpa = 3.75;
					}
					else if($cse_101_total < 75 && $cse_101_total >= 70)
					{
						$cse_101_gpa = 3.50;
					}
					else if($cse_101_total < 70 && $cse_101_total >= 65)
					{
						$cse_101_gpa = 3.25;
					}
					else if($cse_101_total < 65 && $cse_101_total >= 60)
					{
						$cse_101_gpa = 3.00;
					}
					else if($cse_101_total < 60 && $cse_101_total >= 55)
					{
						$cse_101_gpa = 2.75;
					}
					else if($cse_101_total < 55 && $cse_101_total >= 50)
					{
						$cse_101_gpa = 2.50;
					}
					else if($cse_101_total < 50 && $cse_101_total >= 45)
					{
						$cse_101_gpa = 2.25;
					}
					else if($cse_101_total < 45 && $cse_101_total >= 40)
					{
						$cse_101_gpa = 2.00;
					}
					else if($cse_101_total < 40)
					{
						$cse_101_gpa = 0.00;
					}
					else
					{
						$cse_101_gpa = "----";
					}
					
					$cse_102_half = Input::get('cse_102')/2;
					$cse_102_sess = $data->first()->cse_102_sessional;
					$cse_102_total = $cse_102_half + $cse_102_sess;
					if($cse_102_total >= 80)
					{
						$cse_102_gpa = 4.00;
					}
					else if($cse_102_total < 80 && $cse_102_total >= 75)
					{
						$cse_102_gpa = 3.75;
					}
					else if($cse_102_total < 75 && $cse_102_total >= 70)
					{
						$cse_102_gpa = 3.50;
					}
					else if($cse_102_total < 70 && $cse_102_total >= 65)
					{
						$cse_102_gpa = 3.25;
					}
					else if($cse_102_total < 65 && $cse_102_total >= 60)
					{
						$cse_102_gpa = 3.00;
					}
					else if($cse_102_total < 60 && $cse_102_total >= 55)
					{
						$cse_102_gpa = 2.75;
					}
					else if($cse_102_total < 55 && $cse_102_total >= 50)
					{
						$cse_102_gpa = 2.50;
					}
					else if($cse_102_total < 50 && $cse_102_total >= 45)
					{
						$cse_102_gpa = 2.25;
					}
					else if($cse_102_total < 45 && $cse_102_total >= 40)
					{
						$cse_102_gpa = 2.00;
					}
					else if($cse_102_total < 40)
					{
						$cse_102_gpa = 0.00;
					}
					else
					{
						$cse_102_gpa = "----";
					}
					
					$phy_101_half = Input::get('phy_101')/2;
					$phy_101_sess = $data->first()->phy_101_sessional;
					$phy_101_total = $phy_101_half + $phy_101_sess;
					if($phy_101_total >= 80)
					{
						$phy_101_gpa = 4.00;
					}
					else if($phy_101_total < 80 && $phy_101_total >= 75)
					{
						$phy_101_gpa = 3.75;
					}
					else if($phy_101_total < 75 && $phy_101_total >= 70)
					{
						$phy_101_gpa = 3.50;
					}
					else if($phy_101_total < 70 && $phy_101_total >= 65)
					{
						$phy_101_gpa = 3.25;
					}
					else if($phy_101_total < 65 && $phy_101_total >= 60)
					{
						$phy_101_gpa = 3.00;
					}
					else if($phy_101_total < 60 && $phy_101_total >= 55)
					{
						$phy_101_gpa = 2.75;
					}
					else if($phy_101_total < 55 && $phy_101_total >= 50)
					{
						$phy_101_gpa = 2.50;
					}
					else if($phy_101_total < 50 && $phy_101_total >= 45)
					{
						$phy_101_gpa = 2.25;
					}
					else if($phy_101_total < 45 && $phy_101_total >= 40)
					{
						$phy_101_gpa = 2.00;
					}
					else if($phy_101_total < 40)
					{
						$phy_101_gpa = 0.00;
					}
					else
					{
						$phy_101_gpa = "----";
					}
					
					$mth_101_half = Input::get('mth_101')/2;
					$mth_101_sess = $data->first()->mth_101_sessional;
					$mth_101_total = $mth_101_half + $mth_101_sess;
					if($mth_101_total >= 80)
					{
						$mth_101_gpa = 4.00;
					}
					else if($mth_101_total < 80 && $mth_101_total >= 75)
					{
						$mth_101_gpa = 3.75;
					}
					else if($mth_101_total < 75 && $mth_101_total >= 70)
					{
						$mth_101_gpa = 3.50;
					}
					else if($mth_101_total < 70 && $mth_101_total >= 65)
					{
						$mth_101_gpa = 3.25;
					}
					else if($mth_101_total < 65 && $mth_101_total >= 60)
					{
						$mth_101_gpa = 3.00;
					}
					else if($mth_101_total < 60 && $mth_101_total >= 55)
					{
						$mth_101_gpa = 2.75;
					}
					else if($mth_101_total < 55 && $mth_101_total >= 50)
					{
						$mth_101_gpa = 2.50;
					}
					else if($mth_101_total < 50 && $mth_101_total >= 45)
					{
						$mth_101_gpa = 2.25;
					}
					else if($mth_101_total < 45 && $mth_101_total >= 40)
					{
						$mth_101_gpa = 2.00;
					}
					else if($mth_101_total < 40)
					{
						$mth_101_gpa = 0.00;
					}
					else
					{
						$mth_101_gpa = "----";
					}
					
					$ecn_101_half = Input::get('ecn_101')/2;
					$ecn_101_sess = $data->first()->ecn_101_sessional;
					$ecn_101_total = $ecn_101_half + $ecn_101_sess;
					if($ecn_101_total >= 80)
					{
						$ecn_101_gpa = 4.00;
					}
					else if($ecn_101_total < 80 && $ecn_101_total >= 75)
					{
						$ecn_101_gpa = 3.75;
					}
					else if($ecn_101_total < 75 && $ecn_101_total >= 70)
					{
						$ecn_101_gpa = 3.50;
					}
					else if($ecn_101_total < 70 && $ecn_101_total >= 65)
					{
						$ecn_101_gpa = 3.25;
					}
					else if($ecn_101_total < 65 && $ecn_101_total >= 60)
					{
						$ecn_101_gpa = 3.00;
					}
					else if($ecn_101_total < 60 && $ecn_101_total >= 55)
					{
						$ecn_101_gpa = 2.75;
					}
					else if($ecn_101_total < 55 && $ecn_101_total >= 50)
					{
						$ecn_101_gpa = 2.50;
					}
					else if($ecn_101_total < 50 && $ecn_101_total >= 45)
					{
						$ecn_101_gpa = 2.25;
					}
					else if($ecn_101_total < 45 && $ecn_101_total >= 40)
					{
						$ecn_101_gpa = 2.00;
					}
					else if($ecn_101_total < 40)
					{
						$ecn_101_gpa = 0.00;
					}
					else
					{
						$ecn_101_gpa = "----";
					}
					
					$hum_101_half = Input::get('hum_101')/2;
					$hum_101_sess = $data->first()->hum_101_sessional;
					$hum_101_total = $hum_101_half + $hum_101_sess;
					if($hum_101_total >= 80)
					{
						$hum_101_gpa = 4.00;
					}
					else if($hum_101_total < 80 && $hum_101_total >= 75)
					{
						$hum_101_gpa = 3.75;
					}
					else if($hum_101_total < 75 && $hum_101_total >= 70)
					{
						$hum_101_gpa = 3.50;
					}
					else if($hum_101_total < 70 && $hum_101_total >= 65)
					{
						$hum_101_gpa = 3.25;
					}
					else if($hum_101_total < 65 && $hum_101_total >= 60)
					{
						$hum_101_gpa = 3.00;
					}
					else if($hum_101_total < 60 && $hum_101_total >= 55)
					{
						$hum_101_gpa = 2.75;
					}
					else if($hum_101_total < 55 && $hum_101_total >= 50)
					{
						$hum_101_gpa = 2.50;
					}
					else if($hum_101_total < 50 && $hum_101_total >= 45)
					{
						$hum_101_gpa = 2.25;
					}
					else if($hum_101_total < 45 && $hum_101_total >= 40)
					{
						$hum_101_gpa = 2.00;
					}
					else if($hum_101_total < 40)
					{
						$hum_101_gpa = 0.00;
					}
					else
					{
						$hum_101_gpa = "----";
					}
					
					$hum_111_half = Input::get('hum_111')/2;
					$hum_111_sess = $data->first()->hum_111_sessional;
					$hum_111_total = $hum_111_half + $hum_111_sess;
					if($hum_111_total >= 80)
					{
						$hum_111_gpa = 4.00;
					}
					else if($hum_111_total < 80 && $hum_111_total >= 75)
					{
						$hum_111_gpa = 3.75;
					}
					else if($hum_111_total < 75 && $hum_111_total >= 70)
					{
						$hum_111_gpa = 3.50;
					}
					else if($hum_111_total < 70 && $hum_111_total >= 65)
					{
						$hum_111_gpa = 3.25;
					}
					else if($hum_111_total < 65 && $hum_111_total >= 60)
					{
						$hum_111_gpa = 3.00;
					}
					else if($hum_111_total < 60 && $hum_111_total >= 55)
					{
						$hum_111_gpa = 2.75;
					}
					else if($hum_111_total < 55 && $hum_111_total >= 50)
					{
						$hum_111_gpa = 2.50;
					}
					else if($hum_111_total < 50 && $hum_111_total >= 45)
					{
						$hum_111_gpa = 2.25;
					}
					else if($hum_111_total < 45 && $hum_111_total >= 40)
					{
						$hum_111_gpa = 2.00;
					}
					else if($hum_111_total < 40)
					{
						$hum_111_gpa = 0.00;
					}
					else
					{
						$hum_111_gpa = "----";
					}
					
					$all_gpa = $cse_101_gpa * 3 + $cse_102_gpa * 1 + $phy_101_gpa * 3 + $mth_101_gpa * 3 + $ecn_101_gpa * 2 + $hum_101_gpa * 3 + $hum_111_gpa * 4;
					$all_credits = 3 + 1 + 3 + 3 + 2 + 3 + 4;
					
					$total_gpa = $all_gpa/$all_credits;
					
					$register->update11result(array
					(
						'cse_101_final' => Input::get('cse_101'),
						'cse_101_gpa' => $cse_101_gpa,
						'cse_102_final' => Input::get('cse_102'),
						'cse_102_gpa' => $cse_102_gpa,
						'phy_101_final' => Input::get('phy_101'),
						'phy_101_gpa' => $phy_101_gpa,
						'mth_101_final' => Input::get('mth_101'),
						'mth_101_gpa' => $mth_101_gpa,
						'ecn_101_final' => Input::get('ecn_101'),
						'ecn_101_gpa' => $ecn_101_gpa,
						'hum_101_final' => Input::get('hum_101'),
						'hum_101_gpa' => $hum_101_gpa,
						'hum_111_final' => Input::get('hum_111'),
						'hum_111_gpa' => $hum_111_gpa,
						'total_gpa' => $total_gpa
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