<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>
<!--this form is a nested form for deletion related database manipulations.-->

	<body>
		<?php
			if (!isset($_SESSION['activeAdminLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>

        <div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Delete User</h5>
    				<p class="card-text">Remove a user from the organisation.</p>
    				<a href="deluser.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
        </div>

		
	</body>



</html>
