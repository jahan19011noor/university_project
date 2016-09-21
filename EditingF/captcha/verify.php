<?php
//CAPTCHA Matching code
session_start();
if(isset($_POST['captcha']))
{
	if ($_SESSION["code"] == $_POST["captcha"]) 
	{
		echo "Captcha correct";
	}
	else
	{
		echo "Wrong captcha entered!";
	}
}
?>
