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
			if($_GET['coachlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Coach login successful! </div>';
			}

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>

	</body>



</html>
