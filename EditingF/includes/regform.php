<!--<form action="register.php" method="POST">-->
						<div id="myform">
							<ul class="name1">
								<li><h1>Please, fill up the registration form:</h1></li>
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
								<li><h1>Last Name:</h1></li>
								<li><input type="text" name="last" id="name"/>
								<div id="lastfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>User Name:</h1></li>
								<li><input type="text" name="this" id="name"/>
								<div id="userfeed"></div>
								</li>
							</ul>
							<ul class="clear"></ul>
							<ul class="name">
								<li><h1>Your Email:</h1></li>
								<li><input type="text" name="email" id="name"/>
								<div id="emailfeed"></div>
								</li>
							</ul>
							<ul class="clear" id="clear"></ul>
							<ul class="pass">
								<li><h1>Password:<h1/></li>
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
							<ul class="pass" id="radio">
								<li>
									<input type="radio" class="radio" name="gender" value="male">Male<tb>
									<input type="radio" class="radio" id="right_radio" name="gender" value="female">Female
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