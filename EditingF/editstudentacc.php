<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/editstudent.css">
	<link rel="stylesheet" href="captcha/style.css">
</head>
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
				<div id="main_body">
					<div id="myform">
							<ul class="name1">
								<li><h1>Welcome to Edit your Student Account Information!</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image"><img src=""></li>
								<li>
								<div id="imagefeed">Your Profile Image. To change please visit the <a href="studentimg.php">Profile Image Change</a> page</div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>First Name:</h1></li>
								<li><input type="text" name="first" id="name"/>
								<div id="firstfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>MIddle Name:</h1></li>
								<li><input type="text" name="middle" id="name1"/>
								<div id="middlefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Last Name:</h1></li>
								<li><input type="text" name="last" id="name"/>
								<div id="lastfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Your Email:</h1></li>
								<li><input type="text" name="email" id="name"/>
								<div id="emailfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Roll No:</h1></li>
								<li><input type="text" name="roll" id="name2"/>
								<div id="rollfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Reg No:</h1></li>
								<li><input type="text" name="reg" id="name3"/>
								<div id="regfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Level:</h1></li>
								<li><select type="text" name="level" id="name4"/>
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
								<li><h1>Department:</h1></li>
								<li><select type="text" name="dept" id="name5"/>
									<option>CSE</option>
									<option>ECE</option>
								</select>
								<div id="deptfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Phone No:</h1></li>
								<li><input type="text" name="phone" id="name6"/>
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
								<li><input type="button" name="submit" value="Submit!" id="submit1"/></li>
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
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/lineheight.js"></script>
		<script type="text/javascript" src="js/editstudent.js"></script>
	</body>
</html>