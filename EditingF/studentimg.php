<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/editprofile.css">
	<link rel="stylesheet" href="captcha/style.css">
</head>
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
				<div id="main_body">
					<form action="functions/updatestudentimg.php" method="POST" enctype="multipart/form-data">
					<div id="myform">
							<ul class="name1">
								<li><h1>Welcome to Edit your Student Account Image!</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image"><img src=""></li>
								<li>
								<div id="imagefeed">Your Profile Image</div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="submit2">
								<li><input type="button" name="submit2" id="submit2" value="Choose file"/></li>
								<div id="filefeed">Select a file to change your profile image.</div>
								<li><input type="file" name="file" id="submit2" style="display:none"/></li>
							</ul>
							<ul class="clear"></ul>
							
							<div id="feedback"></div>
							
							
							<ul class="clear"></ul>
							
							<input type="hidden" id ="token" name="token">
							
							<ul class="submit1">
								<li><input type="submit" name="submit" value="Submit!" id="submit1"/></li>
							</ul>
							<ul class="clear"></ul>
							
					</div>
					</form>
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
		<script type="text/javascript" src="js/studentimg.js"></script>
	</body>
</html>