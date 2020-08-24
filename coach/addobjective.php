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
			echo '<div class="alert alert-success" role="danger"> This has not been implemented, return to previous page.</div>';

			//make a rudimentary form with a null deadline, later implement datepicker if time allows
			//textarea with a goal, detailing 
			//associated stattype id dropdown (try and leverage session variable of the team's game)
			//player id dropdown
		?>

	</body>



</html>
