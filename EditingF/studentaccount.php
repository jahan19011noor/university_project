<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/student.css">
	<link rel="stylesheet" href="captcha/style.css">
</head>
	
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
		
				
				<div id="main_body">
					<!--<form action="register.php" method="POST">-->
						<div id="myform">
							<ul class="name1">
								<li><h1>Welcome, to create a New Student Account!</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>First Name:</h1></li>
								<li><input type="text" name="first" id="name" maxlength="20" value="<?php if(isset($first_name)){echo $first_name;}?>"/>
								<div id="firstfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Middle Name:</h1></li>
								<li><input type="text" name="middle" id="name1" maxlength="20" value="<?php if(isset($last_name)){echo $last_name;}?>"/>
								<div id="middlefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Last Name:</h1></li>
								<li><input type="text" name="last" id="name" maxlength="20" value="<?php if(isset($last_name)){echo $last_name;}?>"/>
								<div id="lastfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Your Email:</h1></li>
								<li><input type="text" name="email" id="name" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
								<div id="emailfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Roll No:</h1></li>
								<li><input type="text" name="roll" id="name2" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
								<div id="rollfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Reg No:</h1></li>
								<li><input type="text" name="reg" id="name2" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
								<div id="regfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Level:</h1></li>
								<li>
								<select type="text" name="level" id="name3" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
									<option>Choose a level</option>
									<option>1-1</option>
									<option>1-2</option>
									<option>2-1</option>
									<option>2-2</option>
									<option>3-1</option>
									<option>3-2</option>
									<option>4-1</option>
									<option>4-2</option>
								</select>
								<div id="levelfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Phone No:</h1></li>
								<li><input type="text" name="phone" id="name4" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
								<div id="phonefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="pass">
								<li><h1>Keep Phone No:</h1></li>
								<li>
									<input type="radio" class="radio" id="radio1" name="privacy" value="public">Public
									<input type="radio" class="radio" id="radio1" name="privacy" value="private">Private
								</li>
							</ul>
							<ul class="pass" id="radio">
								<li>
									<input type="radio" class="radio" name="dept" value="CSE">CSE
									<input type="radio" class="radio" id="right_radio1" name="dept" value="ECE">ECE
								</li>
							</ul>
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
					<!--</form>-->
				</div>

	<?php
		include 'includes/fixedoverall/overallbottom.php';
	?>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/navslider.js"></script>
		<script type="text/javascript" src="js/signin.js"></script>
		<script type="text/javascript" src="js/lineheight.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/student.js"></script>
	</body>
</html>