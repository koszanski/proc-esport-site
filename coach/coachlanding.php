<?php
	require "../includes/header.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>

<!--refer to player landing, this is functionally identical to that page but with different feedback, showing alerts denoting success when an operation
for manipulating the database is successful.-->
	<body>

		<?php

			if (isset($_GET['error'])){
				if($_GET['error'] == "sqlerror"){
					echo '<div class="alert alert-success" role="danger"> SQL Error! Contact administrator. </div>';
				}
			}

			if (isset($_GET['completeop'])){
				if($_GET['completeop'] == "addannounce"){
					echo '<div class="alert alert-success" role="alert"> Announcement issued! </div>';
				}
				else if($_GET['completeop'] == "addevent"){
					echo '<div class="alert alert-success" role="alert"> Event added! </div>';
				}
				else if($_GET['completeop'] == "addobjective"){
					echo '<div class="alert alert-success" role="alert"> Objective set for player! </div>';
				}

			}
			

			else if($_GET['coachlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Coach login successful! </div>';
			echo '<div class="alert alert-success" role="danger"> Warning: Some functionality is not implemented, notably calendar and graphing, along with most database operations. See Data edit page for more detail.</div>';
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
