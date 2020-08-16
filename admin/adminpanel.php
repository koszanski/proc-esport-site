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
			if($_GET['adminlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Admin login successful! </div>';
			}

			if (!isset($_SESSION['activeAdminLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>
	</body>



</html>
