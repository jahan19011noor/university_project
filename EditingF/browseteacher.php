<?php
	require_once 'core/init1.php';
	
			$feedback = '';
			$data = DB::singleton();
	
			$data1 = $data->get('teachers', array('id', '>', 0));
						
			
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
					<h1>Welcome to the Student members' page.</h1>
					<?php
						foreach($data1->results() as $data_names => $datas)
							{
								//foreach($datas as $data_name => $data)
								//{
					?>
					<div id="posts">
						<div id="imagediv">
							<div id="imager">
								<img src="
								<?php
									if($datas->image == "")
									{
										if($datas->gender == "female")
										{
											echo "images/female.jpg";
										}
										else if($datas->gender == "male")
										{
											echo "images/male.jpg";
										}
									}
									else echo $datas->image;
								?>">
							</div>
						</div>
						<div id="datadiv">
							<div id="data">Name: <?php echo $datas->first_name." ".$datas->middle_name." ".$datas->last_name?></div>
							<div id="data">Post: <?php echo $datas->post?></div>
							<div id="data">Email: <?php echo $datas->email?></div>
							<?php
								if($datas->privacy == "public")
								{
							?>
							<div id="data">Phone: <?php echo $datas->phone?></div>
							<?php
								}
							?>
							<div id="data">Joined: <?php echo $datas->joined?></div>
						</div>
					</div>
						<div class="clear"></div>
						<hr>
					<?php
							
							}
					?>
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
	</body>
</html>