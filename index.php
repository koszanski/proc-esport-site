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
			}


			if (isset($_SESSION['activeLogin'])) {
				echo '<div class="alert alert-success" role="alert"> You are logged in! </div>';
			}
			else {
				echo '<div class="alert alert-danger" role="alert"> You are logged out! </div>';
			}
			

		?>
		<form class="login-form" action="includes/loginlogic.php" method="post">
			<img src="images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			<input type="text" class="form-control" name="username" placeholder="Username" required="">
			<input type="password" class="form-control" name="password" placeholder="Password" required="">

			<a href="adminlogin.php">Admin Login</a>
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="login-submit">Login</button>
			</div>
		</form>

	</body>

</html>