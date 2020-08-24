<?php 
if (isset($_POST['player-login-submit'])) {

    require 'dbconfig.php';

    $user = $_POST['username'];
    $pass = $_POST['password']; 

    $sql = "SELECT user.userID, user.userLogin, user.userPass, user.userName, team_players.teamID, team.teamGameID FROM user INNER JOIN team_players ON user.userID=team_players.teamPlayerID INNER JOIN team ON team_players.teamID=team.teamID WHERE userLogin=?";
    //inner join join onto player table
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
                $_SESSION['activePlayerLogin'] = $row['userLogin'];
                $_SESSION['activePlayerID'] = $row['userID'];
                $_SESSION['activePlayerFullname'] = $row['userName'];
                $_SESSION['activePlayerTeam'] = $row['teamID']; 
                $_SESSION['activePlayerGame'] = $row['teamGameID'];
                header("Location: ../player/playerlanding.php?playerlogin=successful");
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

else if (isset($_POST['coach-login-submit'])){

    require 'dbconfig.php';

    $user = $_POST['username'];
    $pass = $_POST['password']; 

    $sql = "SELECT user.userID, user.userLogin, user.userPass, user.userName, team_coaches.teamID FROM user INNER JOIN team_coaches ON user.userID=team_coaches.teamCoachID INNER JOIN team ON team_coaches.teamID=team.teamID WHERE userLogin=?";
    //inner join onto coach table
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