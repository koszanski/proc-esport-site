<!--form used for coaches to select a specific user in a database and view basic stats about the user. this would be primarily used
to view specific statistics and details specific to the player, as the player page would have a graph.-->

<?php
    require "../includes/header.php";

    if (!isset($_SESSION['activeCoachLogin'])) {
        header("Location: ../index.php");
        exit();
    }
    else {
        require '../includes/dbconfig.php';
        //statement that pulls all login-names, using an INNER JOIN on teamplayers to only grab players, as opposed to coaches (who are also users)
        $sql = "SELECT userLogin FROM user INNER JOIN team_players ON user.userID=team_players.teamPlayerID ORDER BY userID ASC ";
        $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>


	<body>
          
            <div class="form-group">
            <form class="coach-playerselect-submit" action="../shared/player.php" method="post">
                <select class="form-control" name="usernames">
                <?php
                //while statement to pull all username entries into a selection dropdown
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                    $user_name = $row['userLogin'];
                    echo "<option value='$user_name'>$user_name</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-lg btn-primary btn-block" name="coach-playerselect-submit">Select Player</button>
            </form>
            </div>

	</body>



</html>
