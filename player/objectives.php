<!-- see all of the objectives tied with the currently logged in player-->
<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activePlayerLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM objective WHERE objectivePlayerID=" . $_SESSION['activePlayerID'] . " ORDER BY objectiveID DESC";
                $result = mysqli_query($conn, $sql);
            }
        
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>

	<body>
    <div class="container">

        <h3 align="center"> Your Objectives </h3>
        
        <div class="table-responsive">
            <table id="player_objectives_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Goal</td>
                        <td>Stat Type ID</td>
                        <td>Deadline</td>
                        <td>Assigned Player ID</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["objectiveID"].'</td>
                        <td>'.$row["objectiveGoal"].'</td>
                        <td>'.$row["objectiveStatTypeID"].'</td>
                        <td>'.$row["objectiveDeadline"].'</td>
                        <td>'.$row["objectivePlayerID"].'</td>
                        <td>'.$row["objectiveStatus"].'</td>
                    </tr> 
                    ';
                }
                ?>
            </table>



    </div>
		


	</body>

</html>

<script> 
$(document).ready(function(){
    $('#player_objectives_data').DataTable();
});
</script>