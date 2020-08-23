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
			if($_GET['coachlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Coach login successful! </div>';
			}

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>


		<div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">View Profile</h5>
    				<p class="card-text">Select a profile of a player and view it.</p>
    				<a href="playerselect.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Table Overview</h5>
    				<p class="card-text">View tables associated with information exclusive to you..</p>
    				<a href="tables.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Announcements</h5>
    				<p class="card-text">View important issued announcements by your organisation.</p>
    				<a href="../shared/announcements.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Edit Database</h5>
    				<p class="card-text">Database manipulations relevant to you are here.</p>
    				<a href="coachops.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		</div>

	</body>



</html>
