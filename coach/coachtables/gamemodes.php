<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM game_mode ORDER BY gamemodeID DESC";
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

        <h3 align="center"> All Gamemodes </h3>
        
        <div class="table-responsive">
            <table id="gamemodes_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Game ID</td>
                        <td>Gamemode Name</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["gamemodeID"].'</td>
                        <td>'.$row["gameID"].'</td>
                        <td>'.$row["gamemodeName"].'</td>
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
    $('#gamemodes_data').DataTable();
});
</script>