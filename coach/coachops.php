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
			echo '<div class="alert alert-success" role="danger"> Warning: the only implemented and functional database add query is to issue announcements.</div>';
		?>


		<div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add announcement</h5>
    				<p class="card-text">Issue an announcement.</p>
    				<a href="addannounce.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add Event (for individual)</h5>
    				<p class="card-text">Add a calendar-based event for a specific player.</p>
    				<a href="addievent.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add event (for team)</h5>
    				<p class="card-text">Add a calendar-based event for a whole team.</p>
    				<a href="addtevent.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add objective</h5>
    				<p class="card-text">Add an objective/target for a player to fulfill.</p>
    				<a href="addobjective.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		</div>

	</body>



</html>
