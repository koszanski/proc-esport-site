<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM game ORDER BY gameID DESC";
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

        <h3 align="center"> All Games </h3>
        
        <div class="table-responsive">
            <table id="game_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Game Title</td>
                        <td>Game Description</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["gameID"].'</td>
                        <td>'.$row["gameTitle"].'</td>
                        <td>'.$row["gameDesc"].'</td>
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
    $('#game_data').DataTable();
});
</script>