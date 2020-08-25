<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>
<!--addition form to have been used to add individual events, which are accessible to only one specific player-->
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
			//when implementing a datepicker is preferred, if not required to specify dates
		?>

	</body>



</html>
