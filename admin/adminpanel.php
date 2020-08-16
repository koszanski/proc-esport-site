<!DOCTYPE html>
<html>

	<head>
		<?php include ("includes/includes.php"); ?>
	</head>


	<body>
		<?php
			if($_GET['login'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Login successful! </div>';
			}
		?>
	</body>



</html>
