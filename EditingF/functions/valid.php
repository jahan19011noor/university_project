<?php

	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		if(!empty($email))
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				echo "This is not yet valid";
			}
			else
			{
				echo "This is a valid email.";
			}
		}
	}
	
	if(isset($_POST['first_name']))
	{
		$first_name = $_POST['first_name'];
		if(!empty($first_name))
		{
			if(strlen($first_name) < 4)
			{
				echo "This is not yet valid.";
			}
			else
			{
				echo "This is a valid First Name.";
			}
		}
	}
	
	if(isset($_POST['roll']))
	{
		$roll = $_POST['roll'];
		if(!empty($roll))
		{
			if(strlen($roll) < 5)
			{
				echo "This is not yet valid.";
			}
			else if(strlen($roll) > 5)
			{
				echo "This is not a valid roll no.";
			}
			else if(!is_numeric($roll))
			{
				echo "This is not a valid roll no.";
			}
			else if(is_numeric($roll) && strlen($roll) == 5)
			{
				echo "This is a valid roll number.";
			}
		}
	}
	
	if(isset($_POST['num']))
	{
		$num = $_POST['num'];
		if(is_numeric($num))
		{
			echo "This is a valid number.";
		}
		else if(!is_numeric($num) || strlen($num) > 5)
		{
			echo "This is not a valid number.";
		}
	}
	
	if(isset($_POST['num1']))
	{
		$num = $_POST['num1'];
		if(is_numeric($num) && $num <= 50)
		{
			echo "This is a valid Sessional mark.";
		}
		else if(!is_numeric($num) || strlen($num) > 5)
		{
			echo "This is not a valid number.";
		}
		else if(is_numeric($num) && $num > 50)
		{
			echo "Sessional mark invalid.";
		}
	}
	
	if(isset($_POST['dept']))
	{
		$dept = $_POST['dept'];
		if(!empty($dept))
		{
			if(strlen($dept) < 3)
			{
				echo "This is not yet valid.";
			}
			else if(strlen($dept) > 3)
			{
				echo "This is not a valid dept name.";
			}
			else if(is_numeric($dept))
			{
				echo "This is not a valid dept name.";
			}
			else if($dept != "CSE" && $dept != "ECE")
			{
				echo "This is not a valid dept name.";
			}
			else if(
					!is_numeric($dept) &&
					strlen($dept) == 3 &&
					$dept == "CSE" ||
					$dept == "ECE"
					)
			{
				echo "This is a valid dept name.";
			}
		}
	}
		
	if(isset($_POST['reg']))
	{
		$reg = $_POST['reg'];
		if(!empty($reg))
		{
			if(strlen($reg) < 9)
			{
				echo "This is not yet valid.";
			}
			else if(strlen($reg) > 9)
			{
				echo "This is not a valid reg no.";
			}
			else if(!is_numeric($reg))
			{
				echo "This is not a valid reg no.";
			}
			else if(is_numeric($reg) && strlen($reg) == 9)
			{
				echo "This is a valid reg number.";
			}
		}
	}
	
	if(isset($_POST['phone']))
	{
		$phone = $_POST['phone'];
		if(!empty($phone))
		{
			if(strlen($phone) <11)
			{
				echo "This is not yet valid.";
			}
			else if(strlen($phone) > 11)
			{
				echo "This is not a valid phone no.";
			}
			else if(!is_numeric($phone))
			{
				echo "This is not a valid phone no.";
			}
			else if(is_numeric($phone) && strlen($phone) == 11)
			{
				echo "This is a valid phone no.";
			}
		}
	}
	
	if(isset($_POST['middle_name']))
	{
		$middle_name = $_POST['middle_name'];
		if(!empty($middle_name))
		{
			if(strlen($middle_name) < 4)
			{
				echo "This is not yet valid.";
			}
			else
			{
				echo "This is a valid Middle Name.";
			}
		}
	}
	
	if(isset($_POST['full_name']))
	{
		$full_name = $_POST['full_name'];
		if(!empty($full_name))
		{
			if(strlen($full_name) < 8)
			{
				echo "This is not yet valid.";
			}
			else
			{
				echo "This is a valid Middle Name.";
			}
		}
	}
	
	if(isset($_POST['level']))
	{
		$level = $_POST['level'];
		if(!empty($level))
		{
			if($level != "Choose a level")
			{
				echo "This is a valid Level.";
			}
			else if($level == "Choose a level")
			{
				echo "Choose your Level";
			}
			else
			{
				echo "This is not a valid Level.";
			}
		}
	}
	
	if(isset($_POST['post']))
	{
		$post = $_POST['post'];
		if(!empty($post))
		{
			if($post != "Choose your Post")
			{
				echo "This is a valid Post.";
			}
			else if($post == "Choose your Post")
			{
				echo "Choose your Post";
			}
			else
			{
				echo "This is not a valid Post.";
			}
		}
	}
	
	if(isset($_POST['last_name']))
	{
		$last_name = $_POST['last_name'];
		if(!empty($last_name))
		{
			if(strlen($last_name) < 4)
			{
				echo "This is not yet valid.";
			}
			else
			{
				echo "This is a valid Last Name.";
			}
		}
	}
	
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
		if(!empty($username))
		{
			if(strlen($username) < 4)
			{
				echo "This is not yet valid.";
			}
			else
			{
				echo "This is a valid Username.";
			}
		}
	}
	
	if(isset($_POST['password']))
	{
		$password = $_POST['password'];
		if(!empty($password))
		{
			if(strlen($password) < 6)
			{
				echo "This is not yet valid.";
			}
			else if (preg_match('/[A-Z]+[a-z]+[0-9]+/', $password))
			{
				echo 'Strong';
			}
			else if (preg_match('/[A-Z]+[a-z]+/', $password) ||
					preg_match('/[A-Z]+[0-9]+/', $password) ||
					preg_match('/[a-z]+[0-9]+/', $password))
			{
				echo 'Fair';
			}
			else if (preg_match('/[A-Z]+/', $password) ||
				preg_match('/[a-z]+/', $password) ||
				preg_match('/[0-9]+/', $password))
			{
				echo 'Week';
			}
		}
	}
	
	if(isset($_POST['password1']) && isset($_POST['con_password']))
	{
		$password1 = $_POST['password1'];
		$con_password = $_POST['con_password'];
		if(!empty($password1) && !empty($con_password))
		{
			if($password1 == $con_password)
			{
				echo "Matched.";
			}
			else
			{
				echo "Does not match Password.";
			}
		}
	}

?>