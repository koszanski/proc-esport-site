<?php
	session_start();
?>

<!DOCTYPE html>
<html>

	<head>
		<?php 
		//global includes file as header is excluded from this page
		include ("includes/includes.php"); 
		?>
	</head>

	<body>
	<div class="login-container">
		<?php
			//error message alerts. multiple things can go wrong during login, and feedback via GET methods has to be provided to the end user.
			if (isset($_GET['error'])) {
				if($_GET['error'] == "sqlerror"){
					echo '<div class="alert alert-danger" role="alert"> SQL error has occured! Contact administrator! </div>';
				}
				else if($_GET['error'] == "wrongpass"){
					echo '<div class="alert alert-danger" role="alert"> Password mismatch, try again! </div>';
				}
				//there are multiple INNER JOIN conditions that try to pull the assigned team of the player, and then the game to the team.
				//if those are unfulfilled, either an SQL error or this error appears.
				else if($_GET['error'] == "usernotfound"){
					echo '<div class="alert alert-danger" role="alert"> Username not found, unassigned to team, or team is unassigned to game. Contact admin. </div>';
				}
				//since admins have a seperate table from users, this prompt is seperate.
				else if($_GET['error'] == "adminnotfound"){
					echo '<div class="alert alert-danger" role="alert"> Administrator username not found! </div>';
				}
			}

			//this is an automatic elif routine that redirects players/coaches/admins to their appropriate panel should there be an existing successful login session present.
			//?login=successful is used as a GET message to provide feedback that a login succeeded.
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
		<!--the login form itself that uses a POST method to submit to the "loginlogic" file, which handles logging in.
		the inputs for username and password are both REQUIRED fields, and you need to populate them before continuing.-->
		<form class="login-form" action="includes/loginlogic.php" method="post">
			<img src="images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			<input type="text" class="form-control" name="username" placeholder="Username" required="">
			<input type="password" class="form-control" name="password" placeholder="Password" required="">
		<!--there are three different buttons for each type of user, with different logic. an attempt to implement two buttons (user and admin) was made
		but this seemed easier as opposed to having one button, and multiple, nested SQL queries for coach/user when writing the logic file.-->
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="player-login-submit">Player Login</button>
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="coach-login-submit">Coach Login</button>
			<button type="submit" class="btn btn-lg btn-danger btn-block" name="admin-login-submit">Admin Login</button>
			</div>
		</form>

	</body>

</html>