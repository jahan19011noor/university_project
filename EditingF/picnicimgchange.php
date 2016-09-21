<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/picimg.css">
</head>
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
				<div id="main_body">
					<form action="functions/updatepicnicimage.php" method="POST" enctype="multipart/form-data">
					<div id="myform">
							<ul class="name1">
								<li><h1>Welcome to Edit Picnic Images!</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image1"><img src=""></li><div id="img1feed">Current image1 description.</div>
								<div id="img1">Current picnic image 1.</div>
								<li>
								<div id="imagefeed"><textarea name="pic1text" id="imagefeed1" maxlength="100"></textarea></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="submit2">
								<li><input type="button" name="submit1" id="submit2" value="Choose file"/></li>
								<div id="filefeed1">Select a file to change picnic image 1.</div>
								<li><input type="file" name="file1" id="submit2" style="display:none"/></li>
							</ul>
							<ul class="clear"></ul>
							
							<div id="feedback1"></div>
							
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image2"><img src=""></li><div id="img2feed">Current image2 description.</div>
								<div id="img2">Current picnic image 2.</div>
								<li>
								<div id="imagefeed"><textarea name="pic2text" id="imagefeed2" maxlength="100"></textarea></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="submit2">
								<li><input type="button" name="submit2" id="submit2" value="Choose file"/></li>
								<div id="filefeed2">Select a file to change picnic image 2.</div>
								<li><input type="file" name="file2" id="submit2" style="display:none"/></li>
							</ul>
							<ul class="clear"></ul>
							
							<div id="feedback2"></div>
							
							<ul class="clear"></ul>
							<ul class="name">
								<li id="image3"><img src=""></li><div id="img3feed">Current image3 description.</div>
								<div id="img3">Current picnic image 3.</div>
								<li>
								<div id="imagefeed"><textarea name="pic3text" id="imagefeed3" maxlength="100"></textarea></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="submit2">
								<li><input type="button" name="submit3" id="submit2" value="Choose file"/></li>
								<div id="filefeed3">Select a file to change picnic image 3.</div>
								<li><input type="file" name="file3" id="submit2" style="display:none"/></li>
							</ul>
							<ul class="clear"></ul>
							
							<div id="feedback3"></div>
							
							
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
		<script type="text/javascript" src="js/picimgchange.js"></script>
	</body>
</html>