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
			if($_GET['playerlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Player login successful! </div>';
			}

			if (!isset($_SESSION['activePlayerLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>

	</body>



</html>
