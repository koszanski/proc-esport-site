<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activePlayerLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            else {
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM announcements ORDER BY announcementID DESC";
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

        <h3 align="center"> Announcements </h3>
        
        <div class="table-responsive">
            <table id="announcements_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Issuer ID</td>
                        <td>Announcement</td>
                        <td>Team</td>
                    </tr>
                </thead>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$row["announcementID"].'</td>
                        <td>'.$row["announcementIssuerID"].'</td>
                        <td>'.$row["announcementText"].'</td>
                        <td>'.$row["announcementTeamID"].'</td>
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
    $('#announcements_data').DataTable();
});
</script>