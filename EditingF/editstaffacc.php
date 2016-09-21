<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/editstaff.css">
	<link rel="stylesheet" href="captcha/style.css">
</head>
	
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
		
				<div id="main_body">
					<!--<form action="register.php" method="POST">-->
						<div id="myform">
							<ul class="name1">
								<li><h1>Welcome to Edit your Staff Account Information!</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image"><img src=""></li>
								<li>
								<div id="imagefeed">Your Profile Image. To change please visit the <a href="staffimg.php">Profile Image Change</a> page</div>
								</li>
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
								<li><h1>Post:</h1></li>
								<li>
								<select type="text" name="post" id="name3" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
									<option>Choose your Post</option>
									<option>Routine Manager</option>
									<option>Course Manager</option>
									<option>Result Manager</option>
									<option>Student Manager</option>
								</select>
								<div id="postfeed"></div>
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
									<input type="radio" class="radio" id="radio" name="privacy" value="public">Public
									<input type="radio" class="radio" id="radio" name="privacy" value="private">Private
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
		<script type="text/javascript" src="js/editstaff.js"></script>
	</body>
</html>