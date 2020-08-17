<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>


	<body>

		<?php
			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>

	</body>



</html>
