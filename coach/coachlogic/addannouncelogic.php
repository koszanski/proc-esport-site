<?php 
if (isset($_POST['coach-announce-submit'])) {

    require 'includes/dbconfig.php';

    $announcer = $_SESSION['activeCoachID'];
    $announcetext = $_POST['announceText'];
    $announceteam = $_SESSION['activeCoachTeam']; //emphasises that you can only manage the team you are part of, multiteaming breaks this! it picks the first one it sees

    if (empty($announcer) || empty($announcetext) || empty($announceteam)) {
        header("Location: ../coachlanding.php?error=emptyfields");
        exit();
    }
    else {
            $sql = "INSERT INTO announcements (announcementIssuerID, announcementText, announcementTeamID) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_repare($stmt, $sql)) {
                header("Location: ../coachlanding.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "sss", $announcer, $announcetext, $announceteam);
                mysqli_stmt_execute($stmt);
                header("Location: ../coachlanding.php?addannounce=complete");
                exit();
            }
        }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../index.php");
    exit();

}

?>