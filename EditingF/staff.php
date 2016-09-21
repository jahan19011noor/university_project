<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/viewprofile.css">
</head>
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
				<div id="main_body">
					<div id="myform">
							<ul class="name1">
								<li><h1>Welcome, to your Staff Account page!</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image"><img src=""></li>
								<li>
								<div id="imagefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>First Name:</h1></li>
								<li>
								<div id="firstfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Middle Name:</h1></li>
								<li>
								<div id="middlefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Last Name:</h1></li>
								<li>
								<div id="lastfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Your Email:</h1></li>
								<li>
								<div id="emailfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Post:</h1></li>
								<li>
								<div id="postfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Phone No:</h1></li>
								<li>
								<div id="phonefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Joining Date:</h1></li>
								<li>
								<div id="datefeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Membership:</h1></li>
								<li>
								<div id="memfeed">Staff</div>
								</li>
							</ul>
							<ul class="clear"></ul>
							
							<div id="feedback">To change any of your profile information,<br>
							Please, visit the <a href="editstaffacc.php" style="text-decoration: underline; color: rgb(14, 114, 122)">Edit Your Account</a> page.</div>
							
							<ul class="clear"></ul>
							
							<input type="hidden" id ="token" name="token">
							
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
		<script type="text/javascript" src="js/viewstaffacc.js"></script>		
	</body>
</html>