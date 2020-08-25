<?php 
if (isset($_POST['player-login-submit'])) {

    require 'dbconfig.php';
    //variables declared from the login form
    $user = $_POST['username'];
    $pass = $_POST['password']; 

    //lengthy SQL query that also leverages multiple INNER JOINs to associate player with team and it's associated game
    $sql = "SELECT user.userID, user.userLogin, user.userPass, user.userName, team_players.teamID, team.teamGameID, team.teamName, game.gameTitle FROM user INNER JOIN team_players ON user.userID=team_players.teamPlayerID INNER JOIN team ON team_players.teamID=team.teamID INNER JOIN game ON team.teamGameID=game.GameID WHERE userLogin=?";
    $stmt = mysqli_stmt_init($conn);

    //the prepare statement serves as a means of verification, if it returns "false", it means that something in the statement is invalid 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    }
    else {
        //parameter binding is used mainly as a means of preventing SQL injection
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            if ($pass == $row['userPass']) {
                //session is initiated, and variables relevant to the logged in user are saved to the current session by finding
                //the row associated with each column in the SELECT query result is bound to session variables to be used globally
                session_start();
                $_SESSION['activePlayerLogin'] = $row['userLogin'];
                $_SESSION['activePlayerID'] = $row['userID'];
                $_SESSION['activePlayerFullname'] = $row['userName'];
                $_SESSION['activePlayerTeam'] = $row['teamID']; 
                $_SESSION['activePlayerGame'] = $row['teamGameID'];
                $_SESSION['activePlayerTeamName'] = $row['teamName'];
                $_SESSION['activePlayerGameName'] = $row['gameTitle'];
                header("Location: ../player/playerlanding.php?playerlogin=successful");
                exit();
                }              
            }
            //if there is no match against a row for login, this kicks you back to login and gives you an error
            else if($user != $row['userLogin'])
            {
                header("Location: ../index.php?error=usernotfound");
                exit();
            }
            //if the password is not matched, this also kicks you to login and gives an error
            else if($pass != $row['userPass'])
            {
                header("Location: ../index.php?error=wrongpass");
                exit();
            }

    
    }


}

else if (isset($_POST['coach-login-submit'])){
//similar way of function as above
    require 'dbconfig.php';

    $user = $_POST['username'];
    $pass = $_POST['password']; 

    $sql = "SELECT user.userID, user.userLogin, user.userPass, user.userName, team_coaches.teamID FROM user INNER JOIN team_coaches ON user.userID=team_coaches.teamCoachID INNER JOIN team ON team_coaches.teamID=team.teamID INNER JOIN game ON team.teamGameID=game.GameID WHERE userLogin=?";
    //inner join onto coach table as opposed to the player table
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            if ($pass == $row['userPass']) {
                session_start();
                //session variables unique to the coach usertype are populated
                $_SESSION['activeCoachLogin'] = $row['userLogin'];
                $_SESSION['activeCoachID'] = $row['userID'];
                $_SESSION['activeCoachFullname'] = $row['userName'];
                $_SESSION['activeCoachTeam'] = $row['teamID']; 
                $_SESSION['activeCoachGame'] = $row['teamGameID'];
                header("Location: ../coach/coachlanding.php?coachlogin=successful");
                exit();

                }              
            }
            else if($user != $row['userLogin'])
            {
                header("Location: ../index.php?error=usernotfound");
                exit();
            }

            else if($pass != $row['userPass'])
            {
                header("Location: ../index.php?error=wrongpass");
                exit();
            }

    
    }


}



else if (isset($_POST['admin-login-submit'])){

    require 'dbconfig.php';

    $user = $_POST['username'];
    $pass = $_POST['password']; 

    //the whole admin table is pulled, a simple query is made, with no inner joins needed to ascertain additional variables as admins
    //are seperate from team and game
    $sql = "SELECT * FROM admin WHERE adminLogin=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    }
    else {
    
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            if ($pass == $row['adminPass']) {
                //as the username and ID are the only key traits to the admin, they are saved in a session var
                session_start();
                $_SESSION['activeAdminLogin'] = $row['adminLogin'];
                $_SESSION['activeAdminID'] = $row['adminID'];

                header("Location: ../admin/adminpanel.php?adminlogin=successful");
                exit();
                
            }
            else if($pass != $row['adminPass'])
            {
                header("Location: ../index.php?error=wrongpass");
                exit();
            }

        }
        else {
            header("Location: ../index.php?error=adminnotfound");
            exit();
        }
    }
}

else {
    header("Location: ../index.php");
    exit();
}
?>