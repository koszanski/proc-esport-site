<?php
    require "../../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../../includes/dbconfig.php';
                $sql = "SELECT * FROM gaming_session ORDER BY gamingSessionID DESC";
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

        <h3 align="center"> All Sessions </h3>
        
        <div class="table-responsive">
            <table id="gamingsession_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Session Start</td>
                        <td>Session End</td>
                        <td>Player Remarks</td>
                        <td>Player ID</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["gamingSessionID"].'</td>
                        <td>'.$row["gamingSessionStart"].'</td>
                        <td>'.$row["gamingSessionEnd"].'</td>
                        <td>'.$row["gamingSessionPlayerComments"].'</td>
                        <td>'.$row["gamingSessionPlayerID"].'</td>
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
    $('#gamingsession_data').DataTable();
});
</script>