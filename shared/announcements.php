<?php
    require "../includes/header.php";

			if (!isset($_SESSION['activePlayerLogin']) && !isset($_SESSION['activeCoachLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            //conditional elif statement that uses the current team of either player/coach to show announcements relevant to that team.
            else if (isset($_SESSION['activePlayerLogin'])){
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM announcements WHERE announcementTeamID=" .$_SESSION['activePlayerTeam'].  " ORDER BY announcementID DESC";
                $result = mysqli_query($conn, $sql);
            }
            else if (isset($_SESSION['activeCoachLogin'])){
                require '../includes/dbconfig.php';
                $sql = "SELECT * FROM announcements WHERE announcementTeamID=" .$_SESSION['activeCoachTeam'].  " ORDER BY announcementID DESC";
                $result = mysqli_query($conn, $sql);
            }
        
?>

<!DOCTYPE html>
<html>
    <!--- "datatables" powered page to show all team-scale issued announcements in the organization. --->
	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>

	<body>
    <div class="container">

        <h3 align="center"> Announcements </h3>
        
        <div class="table-responsive">
            <table id="announcements_data" class="table table-striped table-bordered">
                <thead>
                <!--thead is used for headings-->
                    <tr>
                        <td>ID</td>
                        <td>Issuer ID</td>
                        <td>Announcement</td>
                        <td>Team</td>
                    </tr>
                </thead>
                <?php
                //a while statement to fetch every row entry until there are no entries left.
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

<!--a required script for DataTables is activated here, the responsive table declared earlier is defined as a datatable-->
<script> 
$(document).ready(function(){
    $('#announcements_data').DataTable();
});
</script>