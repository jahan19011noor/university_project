<?php
	require_once '../core/init.php';
	
	$feedback = "";
	$x = "";
	
	if(Input::exists())
	{
		$user = new Users();
		$data = DB::singleton();
		
		$name1 = $_FILES['file1']['name'];
		$name2 = $_FILES['file2']['name'];
		$name3 = $_FILES['file3']['name'];
		
		$pic = $data->get('picnic_img', array('pic_id', '=', 1));
		
		if($name1 != "")
		{
			$ext1 = substr($name1, strpos($name1, '.', strlen($name1)-5)+1);
			$desc1 = $_POST['pic1text'];
			
			if($_FILES['file1']['size'] > 2097152)
			{
				Session::put('imgwrong', 'The files should be about 2mb in size.');
				Redirect::to('../picnicimgchange.php');
			}
			else if(!in_array($ext1, array('gif','png','jpg','jpeg')))
			{
				Session::put('imgwrong', 'The files are not valid image files.');
				Redirect::to('../picnicimgchange.php');
			}
			else
			{
				$tmp_name1 = $_FILES['file1']['tmp_name'];
				
				$location = '../images/';
				
				if(move_uploaded_file($tmp_name1, $location.$name1))
				{
					Session::put('imgright', 'Image successfully uploaded.');
					
					$picture1 = $pic->first()->image;
					$about1 = $pic->first()->about;
					
					if($about1 == $desc1)
					{
						Session::put('imgwrong', 'Please give description of the new image.');
						Redirect::to('../picnicimgchange.php');
					}
					else if($about1 != $desc1)
					{					
						$image1 = "images/".$name1;
						
						if($picture1 == $image1)
						{
							Session::put('imgright', 'Image successfully uploaded, but it is the same as the previous image.');
						}
						else if($picture1 != $image1)
						{
							$file_to_delete1 = "../".$picture1;
						
							if(unlink($file_to_delete1))
							{
								Session::put('filedil', 'Previous could not be deleted.');
							}
							else
							{
								Session::put('filedil', 'Previous image successfully deleted.');
							}
							try
							{
								$user->updatepicnic(array
								(
									'about' => $desc1,
									'image' => $image1
								), 1);
								Session::put('imgright', 'Image successfully uploaded!');
							}
							catch(Exception $e)
							{
								$x .= $e->getMessage();
							}
						}
					}
				}
			}
		}
		if($name2 != "")
		{
			$ext2 = substr($name2, strpos($name2, '.', strlen($name2)-5)+1);
			$desc2 = $_POST['pic2text'];
			
			if($_FILES['file2']['size'] > 2097152)
			{
				Session::put('imgwrong', 'The files should be about 2mb in size.');
				Redirect::to('../picnicimgchange.php');
			}
			else if(!in_array($ext2, array('gif','png','jpg','jpeg')))
			{
				Session::put('imgwrong', 'The files are not valid image files.');
				Redirect::to('../picnicimgchange.php');
			}
			else
			{
				$tmp_name2 = $_FILES['file2']['tmp_name'];
				
				$location = '../images/';
				
				if(move_uploaded_file($tmp_name2, $location.$name2))
				{
					Session::put('imgright', 'Image successfully uploaded.');
					
					$picture2 = $pic->results()[1]->image;
					$about2 = $pic->results()[1]->about;
					
					if($about2 == $desc2)
					{
						Session::put('imgwrong', 'Please give description of the new image.');
						Redirect::to('../picnicimgchange.php');
					}
					else if($about2 != $desc2)
					{
					$image2 = "images/".$name2;
					
					if($picture2 == $image2)
					{
						Session::put('imgright', 'Image successfully uploaded, but it is the same as the previous image.');
					}
					else if($picture2 != $image2)
					{
						$file_to_delete2 = "../".$picture2;
						
							if(unlink($file_to_delete2))
							{
								Session::put('filedil', 'Previous could not be deleted.');
							}
							else
							{
								Session::put('filedil', 'Previous image successfully deleted.');
							}
						try
						{
							$user->updatepicnic(array
							(
								'about' => $desc2,
								'image' => $image2
							), 2);
							Session::put('imgright', 'Image successfully uploaded!');
						}
						catch(Exception $e)
						{
							$x .= $e->getMessage();
						}
					}
					}
				}
			}
		}
		if($name3 != "")
		{
			$ext3 = substr($name3, strpos($name3, '.', strlen($name3)-5)+1);
			$desc3 = $_POST['pic3text'];
			
			if($_FILES['file3']['size'] > 2097152)
			{
				Session::put('imgwrong', 'The files should be about 2mb in size.');
				Redirect::to('../picnicimgchange.php');
			}
			else if(!in_array($ext3, array('gif','png','jpg','jpeg')))
			{
				Session::put('imgwrong', 'The files are not valid image files.');
				Redirect::to('../picnicimgchange.php');
			}
			else
			{
				$tmp_name3 = $_FILES['file3']['tmp_name'];
				
				$location = '../images/';
				
				if(move_uploaded_file($tmp_name3, $location.$name3))
				{
					Session::put('imgright', 'Image successfully uploaded.');
					
					$picture3 = $pic->results()[2]->image;
					$about3 = $pic->results()[2]->about;
					
					if($about3 == $desc3)
					{
						Session::put('imgwrong', 'Please give description of the new image.');
						Redirect::to('../picnicimgchange.php');
					}
					else if($about3 != $desc3)
					{
					$image3 = "images/".$name3;
					
					if($picture3 == $image3)
					{
						Session::put('imgright', 'Image successfully uploaded, but it is the same as the previous image.');
					}
					else if($picture3 != $image3)
					{
						$file_to_delete2 = "../".$picture2;
						
							if(unlink($file_to_delete2))
							{
								Session::put('filedil', 'Previous could not be deleted.');
							}
							else
							{
								Session::put('filedil', 'Previous image successfully deleted.');
							}
						try
						{
							$user->updatepicnic(array
							(
								'about' => $desc3,
								'image' => $image3
							), 3);
							Session::put('imgright', 'Image successfully uploaded!');
						}
						catch(Exception $e)
						{
							$x .= $e->getMessage();
						}
					}
					}
				}
			}
		}
		Redirect::to('../picnicimgchange.php');
	}
	
?>