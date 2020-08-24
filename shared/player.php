<?php
	require "../includes/header.php";

    if (isset($_SESSION['activeCoachLogin'])) {
		require '../includes/dbconfig.php';
		$selecteduser = $_POST['usernames'];
        $sql = "SELECT user.userID, user.userLogin, user.userName, team.teamName, game.gameTitle FROM user INNER JOIN team_players ON user.userID=team_players.teamPlayerID INNER JOIN team ON team_players.teamID=team.teamID INNER JOIN game ON team.teamGameID=game.GameID WHERE userLogin = '$selecteduser' ORDER BY userID DESC";
		$result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html>

	<head>
		<?php include ("../includes/includes.php"); ?>
	</head>

	<body>

		<?php
			
			if (isset($_SESSION['activeCoachLogin']))
			{
				if(isset($_POST['coach-playerselect-submit']))
				{
					if ($row = mysqli_fetch_assoc($result)) {	
						echo " 	
						<h3>ID: ". $row['userID'] ."</h3>
						<h3>Username: ". $row['userLogin'] ."</h3>
						<h3>Fullname: ". $row['userName'] ."</h3>
						<h3>Team Name: ". $row['teamName']. "</h3>
						<h3>Game Name: ". $row['gameTitle']. "</h3>
						";
						exit();
					}
					exit();
					//grab the username that was posted, lookup id in database, pull values and display
				}

				else {
					header("Location: ../index.php");
    				exit();
				}
			}

			else if (isset($_SESSION['activePlayerLogin']))
			{

				echo " 	
				<h3>ID: ". $_SESSION['activePlayerID'] ."</h3>
				<h3>Username: ". $_SESSION['activePlayerLogin'] ."</h3>
				<h3>Fullname: ". $_SESSION['activePlayerFullname'] ."</h3>
				<h3>Team Name: ". $_SESSION['activePlayerTeamName']. "</h3>
				<h3>Game Name: ". $_SESSION['activePlayerGameName']. "</h3>
				";
				//use session values to show you, the logged in user
				exit();
			}

			else if (!isset($_SESSION['activeCoachLogin']) && !isset($_SESSION['activePlayerLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
            //if player is logged in, just grab the player data from the session tag
			//if coach is set, then use what was used from the post method on a seperate form
			

			//concept for graph:
			//game select dropdown, that pulls all games in db. has js onclick that makes an sql query every time a diff game is selected...
			//gamemode select dropdown. ...gamemode query is changed to show the gamemodes only relevant to that game. this also has an onclick which then...
			//stattype select dropdown. ...shows stattypes only relevant to the gamemode.
			//submit button that shows the graph and makes these queries: 
			//SELECT gamesessionstarttime, statvalue where playerid equals to selected player, AND stattypeid is equal to selected, order DESC gamesessionstarttime
		?>

	</body>



</html>
