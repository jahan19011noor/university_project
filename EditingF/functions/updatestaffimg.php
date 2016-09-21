<?php
	require_once '../core/init.php';
	
	$feedback = "";
	$x = "";
	
	if(Input::exists())
	{
		//echo "done";
		//$validate = new Validation();
		$user = new Users();
		$data = DB::singleton();
		//$check_db = DB::singleton();
		
		$name = $_FILES['file']['name'];
		$ext = substr($name, strpos($name, '.', strlen($name)-5)+1);
		
		if($_FILES['file']['size'] > 2097152)
		{
			Session::put('wrong', 'The file should be about 2mb in size.');
			Redirect::to('imagechange.php');
		}
		else if(!in_array($ext, array('gif','png','jpg','jpeg')))
		{
			Session::put('wrong', 'The file is not a valid image file.');
			Redirect::to('../imagechange.php');
		}
		else
		{
			$tmp_name = $_FILES['file']['tmp_name'];
			$location = '../images/';
			
			if(move_uploaded_file($tmp_name, $location.$name))
			{
				Session::put('right', 'Image successfully uploaded.');
				
				$id = Session::get('users');
				$data = $data->get('staffs', array('user_id', '=', $id));
				
				$img_data = $data->first()->image;
				$staff_id = $data->first()->id;
				
				$image = "images/".$name;
				
				if($img_data == "")
				{
						try
						{
							$user->updatestaff(array
							(
								'image' => $image
							), $staff_id);
							Session::put('right', 'Image successfully uploaded!');
						}
						catch(Exception $e)
						{
							$x .= $e->getMessage();
						}
					
					//Redirect::to('../imagechange.php');
				}
				if($img_data != "")
				{
					if($img_data == $image)
					{
						Session::put('right', 'Image successfully uploaded, but it is the same as the previous image.');
					}
					else if($img_data != $image)
					{
						$file_to_delete = "../".$img_data;
						
						if(unlink($file_to_delete))
						{
							Session::put('filedil', 'Previous could not be deleted.');
						}
						else
						{
							Session::put('filedil', 'Previous image successfully deleted.');
						}
						try
						{
							$user->updatestaff(array
							(
								'image' => $image
							), $staff_id);
							Session::put('right', 'Image successfully uploaded!');
						}
						catch(Exception $e)
						{
							$x .= $e->getMessage();
						}
					}
					//Redirect::to('../imagechange.php');
				}
				Redirect::to('../staffimg.php');
			}
			else
			{
				Session::put('wrong', 'Image upload unsuccessful.');
				Redirect::to('../staffimg.php');
			}
		}
	}
	
?>