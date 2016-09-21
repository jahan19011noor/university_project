<?php
	require_once 'core/init1.php';
	
			$feedback = '';
			$data = DB::singleton();
	
			$data1 = $data->get('courses', array('id', '>', 0));
						
			
			//echo $feedback;

?>

<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/homestyle.css">
	<link rel="stylesheet" href="css/table1.css">
</head>
	
	<?php
		include 'includes/fixedoverall/overalltop.php';
	?>
		
				
				<div id="main_body">
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "1-1")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "1-2")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "2-1")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "2-2")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "3-1")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "3-2")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "4-1")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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
					
					<table>
						<tr>
							<td style="width:170px">Course Code</td>
							<td>Course Title</td>
							<td>Credit</td>
							<td>Level</td>
						</tr>
						<?php
						foreach($data1->results() as $data_names => $datas)
							{
								if($datas->level == "4-2")
								{
								?>
								<tr>
								<?php
								foreach($datas as $data_name => $data)
								{
									if
									(
										$data_name != "id"
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