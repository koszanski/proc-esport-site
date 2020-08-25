<?php
	require "../includes/header.php";
	//the player page dynamically adapts depending on who access it by leveraging SESSION and POST variables
	//the only way this page should be accessed is via the player to see his own profile overview, or
	//by the coach via the "playerselect.php" file to select a specific player to view info on.

	//if this page was accessed properly via playerselect, an sql statement is prepared
    if (isset($_POST['coach-playerselect-submit'])) {
		require '../includes/dbconfig.php';
		//the dropdown select from the playerselect page that was posted via form is declared as a variable
		$selecteduser = $_POST['usernames'];
		//statement is initiated here, multiple inner joins used to associate player with team and it's associated game
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
			//the page changes content here depending on whether a coach or player login session is active, this is for the coach
			if (isset($_SESSION['activeCoachLogin']))
			{
				if(isset($_POST['coach-playerselect-submit']))
				{
					//the if statement can also be used to explicitly declare variables, row is declared as a row entry
					//the previously made query's result has objects fetched from it's array with the fetch_assoc function
					//the row is fetched, with the squared brackets defining the desired column to fetch from. only one result is fetched.
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
				}

				//if the page is accessed through means other than the player selector, you are kicked back to landing
				else {
					header("Location: ../index.php");
    				exit();
				}
			}
			
			//this is content that is instead presented for a player should he access this page
			else if (isset($_SESSION['activePlayerLogin']))
			{
				//all values here are shown from session values that were pulled previously, no secondary query is made
				echo " 	
				<h3>ID: ". $_SESSION['activePlayerID'] ."</h3>
				<h3>Username: ". $_SESSION['activePlayerLogin'] ."</h3>
				<h3>Fullname: ". $_SESSION['activePlayerFullname'] ."</h3>
				<h3>Team Name: ". $_SESSION['activePlayerTeamName']. "</h3>
				<h3>Game Name: ". $_SESSION['activePlayerGameName']. "</h3>
				";
				exit();
			}
			//if someone that is neither coach or player tries to access this page, they are kicked back to the login page
			else if (!isset($_SESSION['activeCoachLogin']) && !isset($_SESSION['activePlayerLogin'])) {
				header("Location: ../index.php");
    			exit();
            }
			

			//Concept on how to implement graphing:
			//game select dropdown, that pulls all games in db. has js onclick that makes an sql query every time a diff game is selected...
			//gamemode select dropdown. ...gamemode query is changed to show the gamemodes only relevant to that game. this also has an onclick which then...
			//stattype select dropdown. ...shows stattypes only relevant to the gamemode.
			//submit button that shows the graph and makes these queries: 
			//SELECT gamesessionstarttime, statvalue where playerid equals to selected player, AND stattypeid is equal to selected, order DESC gamesessionstarttime
		?>

	</body>



</html>
