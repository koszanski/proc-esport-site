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
			if($_GET['adminlogin'] == "successful")
			{
			echo '<div class="alert alert-success" role="alert"> Admin login successful! </div>';
			}

			if (!isset($_SESSION['activeAdminLogin'])) {
				header("Location: ../index.php");
    			exit();
			}
		?>

		<div class="row">
		  <div class="col-xs-1-12">
			<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Addition operations</h5>
    				<p class="card-text">Operations to add items to the database.</p>
    				<a href="adminadd.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		  </div>
		  <div class="col-xs-1-12">
		  	<div class="card" style="width: 18rem;">
  				<div class="card-body">
  					<h5 class="card-title">Removal operations.</h5>
    				<p class="card-text">Operations to remove items from the database.</p>
    				<a href="admindel.php" class="btn btn-primary">Go</a>
  				</div>
			</div>
		   </div>
		</div>


	</body>



</html>
