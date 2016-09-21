<?php
	require_once 'core/init1.php';
	
			$feedback = '';
			$data = DB::singleton();
	
			$data1 = $data->get('post', array('id', '>', 0));
						
			
			//echo $feedback;

?>

<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/homestyle.css">
</head>
	
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
		
				
				<div id="main_body">
					<h1>Welcome to our home page!</h1>
					<div id="shower" class="disappear">
					<h1>Let's post something new!!!</h1>
					
						<div id="test">
						<div id="imagefeed"><textarea name="pic1text" id="imagefeed1" maxlength="500"></textarea></div>
							<div id="catagory">
								<select type="text" name="level" id="name3" maxlength="50" value="<?php if(isset($email)){echo $email;}?>"/>
									<option>Choose a Catagory</option>
									<option>Classes</option>
									<option>Assignment</option>
									<option>Class Test</option>
									<option>Mid Term</option>
									<option>Lab Test</option>
									<option>Final Exam</option>
									<option>Project Presentation</option>
									<option>Rag Day</option>
									<option>Birthday Celebration</option>
									<option>News</option>
									<option>Updates</option>
								</select>
								<input type="submit" name="submit" class="submit" value="Post!" id="submit1"/>
								<div id="feedbacker"></div>
							</div>
						</div>
						<ul class="clear"></ul>
						<hr>
					</div>
					<div id="posts">
					<?php
						foreach($data1->results() as $data_names => $datas)
							{
								foreach($datas as $data_name => $data)
								{
									?>
						<p id="cat_para">
						<?php
							if($data_name == "catagory")
							{
								echo $data;
							}
							if($data_name == "posted_on")
							{
								echo " posted on: ".$data;
							}
						?>
						<p>
						<p id="post_para">
						<?php
							if($data_name == "text")
							{
								echo $data;
							}
						?>
						<p>
								<?php
								}
								?>
								<hr>
								<?php
							}
					?>
					</div>
				</div>

	<?php
		include 'includes/fixedoverall/overallbottom.php';
	?>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/navslider.js"></script>
		<script type="text/javascript" src="js/signin.js"></script>
		<script type="text/javascript" src="js/lineheight.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/homepage.js"></script>
		<script type="text/javascript" src="js/control.js"></script>
	</body>
</html>