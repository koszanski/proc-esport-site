<!--pulls database of players, places into a dropdown form. selected user has all variables pulled then posted-->

<?php
    require "../includes/header.php";

    if (!isset($_SESSION['activeCoachLogin'])) {
        header("Location: ../index.php");
        exit();
    }
    else {
        require '../includes/dbconfig.php';
        $sql = "SELECT userLogin FROM user INNER JOIN team_players ON user.userID=team_players.teamPlayerID ORDER BY userID DESC ";
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
