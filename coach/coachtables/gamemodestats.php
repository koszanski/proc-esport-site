<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM game_mode_stats ORDER BY gamemodeID DESC";
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

        <h3 align="center"> GameMode/Game Stat Type </h3>
        
        <div class="table-responsive">
            <table id="gamemodestat_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Game Mode ID</td>
                        <td>Game Stat Type ID</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["gamemodeID"].'</td>
                        <td>'.$row["gameStatTypeID"].'</td>
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
    $('#gamemodestat_data').DataTable();
});
</script>