<?php
	require_once '../core/init.php';
	
			//$user = new Users();
			$data = DB::singleton();
			$id = Session::get('users');
			$teacher = $data->get('teachers', array('user_id', '=', $id))->count();
			$student = $data->get('students', array('user_id', '=', $id))->count();
			$staff = $data->get('staffs', array('user_id', '=', $id))->count();
			
			if($teacher != 0)
			{
				Redirect::to('../teacher.php');
			}
			else if($student != 0)
			{
				Redirect::to('../student.php');
			}
			else if($staff != 0)
			{
				Redirect::to('../staff.php');
			}
			else
			{
				Redirect::to('../includes/errors/404.php');
			}
?>