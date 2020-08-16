<?php
	require "header.php";
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
					echo '<div class="alert alert-danger" role="alert"> SQL error has occured! </div>';
				}
				else if($_GET['error'] == "wrongpass"){
					echo '<div class="alert alert-danger" role="alert"> Password mismatch, try again! </div>';
				}
				else if($_GET['error'] == "usernotfound"){
					echo '<div class="alert alert-danger" role="alert"> Username not found! </div>';
				}
				else if($_GET['error'] == "adminnotfound"){
					echo '<div class="alert alert-danger" role="alert"> Administrator username not found! </div>';
				}
				else if ($_GET['error'] == "unassigned"){
					echo '<div class="alert alert-danger" role="alert"> Credentials match, but not assigned to team, contact database admin. </div>';
				}
			}


		?>
		<form class="login-form" action="includes/loginlogic.php" method="post">
			<img src="images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			<input type="text" class="form-control" name="username" placeholder="Username" required="">
			<input type="password" class="form-control" name="password" placeholder="Password" required="">

			<button type="submit" class="btn btn-lg btn-primary btn-block" name="login-submit">Login</button>
			<button type="submit" class="btn btn-lg btn-danger btn-block" name="adminlogin-submit">Admin Login</button>
			</div>
		</form>

	</body>

</html>