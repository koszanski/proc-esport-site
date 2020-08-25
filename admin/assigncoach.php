<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>
<!--this form would be purposed for assigning coaches to teams, but it was not complete.-->

	<body>

		<?php
			if (!isset($_SESSION['activeAdminLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
			echo '<div class="alert alert-success" role="danger"> This has not been implemented, return to previous page.</div>';
		?>

	</body>



</html>
