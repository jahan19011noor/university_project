<?php
	require_once '../core/init.php';
	
			$feedback = '';
			$data = DB::singleton();
	
			$data1 = $data->get('picnic_img', array('pic_id', '=', 1));
						
			foreach($data1->results() as $data_names => $datas)
			{
				foreach($datas as $data_name => $data)
				{
					if
					(
						$data_name != "id" &&
						$data_name != "pic_id"
					)
					{
						$feedback .= $data.', ';
					}
				}
			}
			echo $feedback;

?>