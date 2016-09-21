<?php
	require_once '../core/init.php';
	
			$feedback = '';
			$data = DB::singleton();
	
			$data1 = $data->get('courses', array('level', '=', '1-2'));
						
			foreach($data1->results() as $data_names => $datas)
			{
				foreach($datas as $data_name => $data)
				{
					if
					(
						$data_name == 'course_code'
					)
					{
						$feedback .= $data.', ';
					}
				}
			}
			echo $feedback;

?>