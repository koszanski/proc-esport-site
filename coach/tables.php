<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>
<!-- page with all "datatable" type pages (used for viewing various database info) links in card form, same as previous landing pages-->
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


		<div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">All Objectives</h5>
    				<p class="card-text">View all outstanding objectives in your team.</p>
    				<a href="coachtables/allobjectives.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Gamemodes</h5>
    				<p class="card-text">View all gamemodes.</p>
    				<a href="coachtables/gamemodes.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Game-mode associated stats</h5>
    				<p class="card-text">View stattypes associated with specific game-modes.</p>
    				<a href="coachtables/gamemodestats.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Games</h5>
    				<p class="card-text">View populated games.</p>
    				<a href="coachtables/games.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Game Sessions</h5>
    				<p class="card-text">View added/concluded game-sessions.</p>
    				<a href="coachtables/gamesessions.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Statistics</h5>
    				<p class="card-text">Add a calendar-based event for a specific player.</p>
    				<a href="coachtables/statistics.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Statistic Types</h5>
    				<p class="card-text">Add a calendar-based event for a whole team.</p>
    				<a href="coachtables/stattypes.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		</div>

	</body>



</html>
