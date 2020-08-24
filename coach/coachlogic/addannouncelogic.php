<?php 
if (isset($_POST['coach-announce-submit'])) {

    require '../../includes/dbconfig.php';
    session_start();
    $announcer = $_SESSION['activeCoachID'];
    $announcetext = $_POST['announceText'];
    $announceteam = $_SESSION['activeCoachTeam']; //emphasises that you can only manage the team you are part of, multiteaming breaks this! it picks the first one it sees

    $sql = "INSERT INTO announcements (announcementIssuerID, announcementText, announcementTeamID) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../coachlanding.php?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $announcer, $announcetext, $announceteam);
        mysqli_stmt_execute($stmt);
        header("Location: ../coachlanding.php?addannounce=complete");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../index.php");
    exit();

}

?>