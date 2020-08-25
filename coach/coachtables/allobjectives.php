<?php
    require "../../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../../index.php");
    			exit();
            }
            else {
                //query is designed to only show objectives for players that are belonging to the same team as the coach.
                require '../../includes/dbconfig.php';
                $sql = "SELECT * FROM objective INNER JOIN team_players ON objective.objectivePlayerID=team_players.teamPlayerID INNER JOIN team_coaches ON team_players.teamID=team_coaches.teamID ORDER BY objectiveID DESC";
                $result = mysqli_query($conn, $sql);
            }
        
?>

<!DOCTYPE html>
<html>
<!-- "datatable" styled page-->
	<head>
		<?php include ("../../includes/includes.php"); ?>
	</head>

	<body>
    <div class="container">

        <h3 align="center"> All Objectives </h3>
        
        <div class="table-responsive">
            <table id="objectives_data" class="table table-striped table-bordered">
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
    $('#objectives_data').DataTable();
});
</script>