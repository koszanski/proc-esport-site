<!DOCTYPE html>
<html>

	<head>
		<?php include ("includes/includes.php"); ?>
	</head>

	<body>
	<div class="login-container">
		<form class="login-form" action="" method="post">
			<img src="images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			<input type="text" class="form-control" name="username" placeholder="Username" required="">
			<input type="password" class="form-control" name="password" placeholder="Password" required="">

			<a href="adminlogin.php">Admin Login</a>
			<button class="btn btn-lg btn-primary btn-block">Login</button>
			</div>
		</form>

	</body>

</html>