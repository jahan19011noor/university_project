<?php

	require_once '../core/init.php';
	$no_of_rows = Session::get('no_of_rows');
	$no_of_columns = Session::get('no_of_columns');
	$data = Session::get('datas');
	//$level = Session::get('level');
	$datas = explode(',', $data);
	
?>

<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/results.css">
	<link rel="stylesheet" href="../css/table.css">
</head>
	<body>
	<div id="contain">
		<h1>Welcome to the Result Processing page!</h1>
		<table>
			<th>
			<?php
			for($x=0; $x<$no_of_columns; $x++)
			{
				if($x==0)
				{
			?>
				<td id="header_table">Name of Student</td>
			<?php
				}
				if($x==1)
				{
				?>
					<td id="header_table">Roll No</td>
				<?php	
				}
				if($x>1)
				{
					for($y=0; $y<$no_of_columns-2; $y++)
					{
					?>
						<td id="header_table"><?php echo $datas[$x-2]?></td>
					<?php
					}
				}
			}
			?>
			</th>
						
		</table>
		<?php
			
		?>
	</div>
	</body>
</html>