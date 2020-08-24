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
			if($_GET['playerlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Player login successful! </div>';
			echo '<div class="alert alert-success" role="danger"> Note: graph and calendar functionality is not implemented.</div>';
			}

			if (!isset($_SESSION['activePlayerLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>
<!--view player, view objectives, view announcements, maybe view calendar, maybe view stat graph or implement into player page-->

		<div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">View Profile</h5>
    				<p class="card-text">View an overview of your profile.</p>
    				<a href="../shared/player.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Objectives</h5>
    				<p class="card-text">View your outstanding targets issued to you by your coach.</p>
    				<a href="objectives.php" class="btn btn-primary">Go</a>
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
		</div>

	</body>
</html>