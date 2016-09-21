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
								<li><h1>Welcome to Publish the Final results for first year first semester:</h1></li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Full Name of Student:</h1></li>
								<li><input type="text" name="first" id="namea"/>
								<div id="firstfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Roll No:</h1></li>
								<li><input type="text" name="last" id="nameb"/>
								<div id="lastfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Session:</h1></li>
								<li>
								<select type="text" name="level" id="namexd"/>
									<option>Choose a session</option>
									<option>Spring</option>
									<option>Fall</option>
								</select>
								<div id="levelfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Year:</h1></li>
								<li>
								<select type="text" name="level1" id="namexe"/>
									<option>Choose the Year</option>
									<option>2010</option>
									<option>2011</option>
									<option>2012</option>
									<option>2013</option>
									<option>2014</option>
									<option>2015</option>
									<option>2016</option>
									<option>2018</option>
									<option>2019</option>
									<option>2020</option>
									<option>2021</option>
									<option>2022</option>
								</select>
								<div id="levelfeed"></div>
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
								<li><input type="text" name="last3" id="name5"/>
								<div id="lastfeed3"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divd" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last4" id="name1"/>
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
								<li><input type="text" name="last6" id="name3"/>
								<div id="lastfeed6"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divg" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last7" id="name4"/>
								<div id="lastfeed7"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name" id="divh" style="display: none">
								<li><h1></h1></li>
								<li><input type="text" name="last8" id="name"/>
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
		<script type="text/javascript" src="js/11courses.js"></script>
		
	</body>
</html>