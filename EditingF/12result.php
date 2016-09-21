<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="captcha/style.css">
</head>
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
				<div id="main_body">
					<div id="myform">
							<ul class="name1">
								<li><h1>Welcome to Publish the results for first year first semester:</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Full Name of Student:</h1></li>
								<li><input type="text" name="first" id="namea" maxlength="20" value="<?php if(isset($first_name)){echo $first_name;}?>"/>
								<div id="firstfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Roll No:</h1></li>
								<li><input type="text" name="last" id="nameb" maxlength="20" value="<?php if(isset($last_name)){echo $last_name;}?>"/>
								<div id="lastfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name1">
								<li><h1>Enter the marks in the respective subjects:</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="diva" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last1" id="name5"/>
								<div id="lastfeed1"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divb" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last2" id="name5"/>
								<div id="lastfeed2"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divc" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last3" id="namezx"/>
								<div id="lastfeed3"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divd" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last4" id="nameza"/>
								<div id="lastfeed4"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="dive" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last5" id="name2"/>
								<div id="lastfeed5"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divf" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last6" id="namezb"/>
								<div id="lastfeed6"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divg" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last7" id="namezc"/>
								<div id="lastfeed7"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divh" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last8" id="namezd"/>
								<div id="lastfeed8"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divi" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last9" id="name"/>
								<div id="lastfeed9"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divj" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last10" id="name"/>
								<div id="lastfeed10"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divk" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last11" id="name"/>
								<div id="lastfeed11"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divl" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last12" id="name"/>
								<div id="lastfeed12"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divm" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last13" id="name"/>
								<div id="lastfeed13"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divn" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last14" id="name"/>
								<div id="lastfeed14"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<div id="feedback"></div>
							
							
							<ul class="clear"></ul>
							
							<input type="hidden" id ="token" name="token">
							
							<ul class="submit1">
								<li><input type="button" name="submit" value="Publish!" id="submit1"/></li>
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
		<script type="text/javascript" src="js/signin.js"></script>
		<script type="text/javascript" src="js/12courses.js"></script>
		
	</body>
</html>