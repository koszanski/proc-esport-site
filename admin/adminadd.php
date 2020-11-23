<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>

<!--this form is a nested form for addition related database manipulations.-->
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
  					<h5 class="card-title">Add game</h5>
    				<p class="card-text">Add a new videogame for the organization.</p>
    				<a href="addgame.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add gamemode</h5>
    				<p class="card-text">Add a gamemode type for a specific game.</p>
    				<a href="addgamemode.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add stattype</h5>
    				<p class="card-text">Add a type of statistic.</p>
    				<a href="addstattype.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Assign stattype</h5>
    				<p class="card-text">Assign a stattype to a specific gamemode.</p>
    				<a href="assignstattype.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		</div>
        <div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Add a user</h5>
    				<p class="card-text">Add a user to an organization.</p>
    				<a href="adduser.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
          <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Assign a player</h5>
    				<p class="card-text">Assign a user to an organization's team as a player.</p>
    				<a href="assignplayer.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
          <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Assign a coach</h5>
    				<p class="card-text">Assign a user to an organization's team as a coach.</p>
    				<a href="assigncoach.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
        </div>

		
	</body>



</html>
