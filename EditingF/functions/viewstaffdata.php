<?php
	require_once '../core/init.php';
	
	$feedback = '';
	
	if(Input::exists())
	{
		if(Token::check(Input::get('token')))
		{
			$user = new Users();
			$data = DB::singleton();
	
			$data = $data->get('staffs', array('user_id', '=', Input::get('id')));
			
			//echo $data->first()->id;
			
			
			foreach($data->first() as $data_name => $datas)
			{
				if
				(
					$data_name != "id" &&
					$data_name != "user_id" &&
					$data_name != "privacy"
				)
				{
					$feedback .= $datas.', ';
				}
			}
			echo $feedback;
		}
	}
?>