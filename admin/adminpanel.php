<?php
	require "header.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>


	<body>
		<?php
			if($_GET['login'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Admin login successful! </div>';
			}
		?>
	</body>



</html>
