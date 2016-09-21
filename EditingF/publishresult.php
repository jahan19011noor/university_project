<?php
	require_once 'core/init1.php';
	
			$feedback = '';
			$data = DB::singleton();
	
			$data1 = $data->get('11_result', array('id', '>', 0));
						
			
			//echo $feedback;

?>

<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/table.css">
</head>
	
	<body>
	<div id="contain">
	<?php
		include 'includes/header.php';//the top banner
	?>
		
	<div id="container">
	<?php
		include 'includes/navigation.php';//the top navigation menu
	?>
				<div class="clear"></div>
		
				
				<div id="main_body">
					<table style="width:915px">
						<tr>
							<td style="width:170px">Name of Student</td>
							<td>Roll No</td>
							<td>Semester</td>
							<td>CSE-101</td>
							<td>CSE-102</td>
							<td>PHY-101</td>
							<td>MTH-101</td>
							<td>ECN-101</td>
							<td>HUM-101</td>
							<td>HUM-111</td>
							<td>GPA</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->session_year == "Spring 2015")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name == "full_name" ||
										$data_name == "roll_no" ||
										$data_name == "session_year" ||
										$data_name == "cse_101_gpa" ||
										$data_name == "cse_102_gpa" ||
										$data_name == "phy_101_gpa" ||
										$data_name == "mth_101_gpa" ||
										$data_name == "ecn_101_gpa" ||
										$data_name == "hum_101_gpa" ||
										$data_name == "hum_111_gpa" ||
										$data_name == "total_gpa"
									)
									{
										?>
										<td>
										<?php
											echo $data;
										?>
										</td>
										<?php
									}
								}
								?>
								</tr>
								<?php
								}
							}
						?>
					</table>
					
					<table style="width:915px">
						<tr>
							<td style="width:170px">Name of Student</td>
							<td>Roll No</td>
							<td>Semester</td>
							<td>CSE-101</td>
							<td>CSE-102</td>
							<td>PHY-101</td>
							<td>MTH-101</td>
							<td>ECN-101</td>
							<td>HUM-101</td>
							<td>HUM-111</td>
							<td>GPA</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->session_year == "Fall 2015")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name == "full_name" ||
										$data_name == "roll_no" ||
										$data_name == "session_year" ||
										$data_name == "cse_101_gpa" ||
										$data_name == "cse_102_gpa" ||
										$data_name == "phy_101_gpa" ||
										$data_name == "mth_101_gpa" ||
										$data_name == "ecn_101_gpa" ||
										$data_name == "hum_101_gpa" ||
										$data_name == "hum_111_gpa" ||
										$data_name == "total_gpa"
									)
									{
										?>
										<td>
										<?php
											echo $data;
										?>
										</td>
										<?php
									}
								}
								?>
								</tr>
								<?php
								}
							}
						?>
					</table>
				</div>

	</div>
	
		<div class="clear"></div>
		
	<?php
		include 'includes/footer.php';//footer.
	?>
	</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/navslider.js"></script>
		<script type="text/javascript" src="js/signin.js"></script>
		<script type="text/javascript" src="js/lineheight.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>