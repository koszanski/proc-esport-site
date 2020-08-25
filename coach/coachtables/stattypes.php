<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM stattype ORDER BY stattypeID DESC";
                $result = mysqli_query($conn, $sql);
            }
        
?>

<!DOCTYPE html>
<html>
<!-- "datatable" styled page-->
	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>

	<body>
    <div class="container">

        <h3 align="center"> All Stattypes </h3>
        
        <div class="table-responsive">
            <table id="stattype_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Stat Name</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["stattypeID"].'</td>
                        <td>'.$row["statName"].'</td>
                        <td>'.$row["statDesc"].'</td>
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
    $('#stattype_data').DataTable();
});
</script>