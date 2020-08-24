<?php
	session_start();
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("includes/includes.php"); ?>
	</head>

	<body>
	<div class="login-container">
		<?php

			if (isset($_GET['error'])) {
				if($_GET['error'] == "sqlerror"){
					echo '<div class="alert alert-danger" role="alert"> SQL error has occured! Contact administrator! </div>';
				}
				else if($_GET['error'] == "wrongpass"){
					echo '<div class="alert alert-danger" role="alert"> Password mismatch, try again! </div>';
				}
				else if($_GET['error'] == "usernotfound"){
					echo '<div class="alert alert-danger" role="alert"> Username not found or unassigned to team, contact admin. </div>';
				}
				else if($_GET['error'] == "adminnotfound"){
					echo '<div class="alert alert-danger" role="alert"> Administrator username not found! </div>';
				}
			}

			if (isset($_SESSION['activePlayerLogin']))
			{
				header("Location: ../player/playerlanding.php?playerlogin=successful");
				exit();
			}

			else if (isset($_SESSION['activeCoachLogin']))
			{
				header("Location: ../coach/coachlanding.php?coachlogin=successful");
                exit();
			}
			else if (isset($_SESSION['activeAdminLogin']))
			{
				header("Location: ../admin/adminpanel.php?adminlogin=successful");
                exit();
			}

		?>
		<form class="login-form" action="includes/loginlogic.php" method="post">
			<img src="images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			<input type="text" class="form-control" name="username" placeholder="Username" required="">
			<input type="password" class="form-control" name="password" placeholder="Password" required="">

			<button type="submit" class="btn btn-lg btn-primary btn-block" name="player-login-submit">Player Login</button>
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="coach-login-submit">Coach Login</button>
			<button type="submit" class="btn btn-lg btn-danger btn-block" name="admin-login-submit">Admin Login</button>
			</div>
		</form>

	</body>

</html>