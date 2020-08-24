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

		<form class="announce-form" action="coachlogic/addannouncelogic.php" method="post">
			<textarea class="form-control" name="announceText" rows="5" required=""></textarea>
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="coach-announce-submit">Issue Announcement</button>
		</form>	

	</body>



</html>
