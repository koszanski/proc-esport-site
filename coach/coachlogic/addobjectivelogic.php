<?php 
//as the form was never implemented, this logic was never tested and serves as an approximate placeholder.
if (isset($_POST['coach-objective-submit'])) {

    require '../../includes/dbconfig.php';
    session_start();

    $goal = $_POST['objectiveGoal'];
    $stattypeid = $_POST['StatTypeID'];
    $deadline = $_POST['deadlineDate'];
    $playerid = $_POST['selectedPlayer'];
    $objective = "Active";

    $sql = "INSERT INTO objective (objectiveGoal, objectiveStatTypeID, objectiveDeadline, objectivePlayerID, objectiveStatus) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_repare($stmt, $sql)) {
        header("Location: ../coachlanding.php?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "sssss", $goal, $stattypeid, $deadline, $playerid, $objective);
        mysqli_stmt_execute($stmt);
        header("Location: ../coachlanding.php?addobjective=complete");
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