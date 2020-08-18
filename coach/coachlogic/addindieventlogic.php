<?php 
if (isset($_POST['coach-eventi-submit'])) {

    require 'includes/dbconfig.php';

    $eventstart = $_POST['startDate'];
    $eventend = $_POST['endDate'];
    $eventplayer = $_POST['selectedPlayer']; //player id into text box
    $eventissuer = $_SESSION['activeCoachID'];
    $eventdesc = $_POST['eventDescription'];

    if (empty($eventstart) || empty($eventend) || empty($eventplayer) || empty($eventissuer) || empty($eventdesc)) {
        header("Location: ../coachlanding.php?error=emptyfields");
        exit();
    }
    else {
            $sql = "INSERT INTO event_individual (eventStart, eventEnd, eventIssuerID, eventPlayerID, eventDesc) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_repare($stmt, $sql)) {
                header("Location: ../coachlanding.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "sssss", $eventstart, $eventend, $eventplayer, $eventissuer, $eventdesc);
                mysqli_stmt_execute($stmt);
                header("Location: ../coachlanding.php?addevent=complete");
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