<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM statistic ORDER BY statID DESC";
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

        <h3 align="center"> All Stats </h3>
        
        <div class="table-responsive">
            <table id="stat_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Stat Session</td>
                        <td>Stat Type</td>
                        <td>Stat Value</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["statID"].'</td>
                        <td>'.$row["statSessionID"].'</td>
                        <td>'.$row["statTypeID"].'</td>
                        <td>'.$row["statValue"].'</td>
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
    $('#stat_data').DataTable();
});
</script>