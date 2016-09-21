<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/changepass.css">
	<link rel="stylesheet" href="captcha/style.css">
</head>
	
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
		
				
				<div id="main_body">
					<div id="myform">
							<ul class="name1">
								<li><h1>Please, fill up the registration form:</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>User Name:</h1></li>
								<li><input type="text" name="this" id="name" maxlength="20" value="<?php if(isset($last_name)){echo $last_name;}?>"/>
								<div id="userfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Your Email:</h1></li>
								<li><input type="text" name="email" id="name" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
								<div id="emailfeed"></div>
								</li>
							</ul>
							<ul class="clear" id="clear"></ul>
							<ul class="pass">
								<li><h1>New Password:<h1/></li>
								<li><input type="password" name="pass" id="pass1"/>
								<div id="passfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="pass">
								<li><h1>Confirm Password:<h1/></li>
								<li><input type="password" name="pass_again" id="pass2"/>
								<div id="passagain"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="img_cap">
								<li>
									<div id="imgdiv"><img id="img1" src="captcha/captcha.php" /></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							
							<ul class="pass">
								<li><h1 id="move">Please, type the value you see:<h1/></li>
								<li><input type="text" name="captcha" id="pass3"/></li>
							</ul>
							<ul class="clear"></ul>
							
							<div id="feedback"></div>
							
							
							<ul class="clear"></ul>
							
							<input type="hidden" id ="token" name="token">
							
							<ul class="submit1">
								<li><input type="button" name="submit" value="Sign Up" id="submit1"/></li>
							</ul>
							<ul class="clear"></ul>
							
						</div>
				</div>

	<?php
		include 'includes/fixedoverall/overallbottom.php';
	?>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/captcha.js"></script>
		<script type="text/javascript" src="js/navslider.js"></script>
		<script type="text/javascript" src="js/lineheight.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/changepass.js"></script>
	</body>
</html>