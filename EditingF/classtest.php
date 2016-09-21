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
					<h1>Welcome to the Class Test news page.</h1>
					
					<div id="posts">
					<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->catagory == "Class Test")
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
	</body>
</html>