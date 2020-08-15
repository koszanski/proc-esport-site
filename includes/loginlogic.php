<?php 
if (isset($_POST['login-submit'])) {

    require 'dbconfig.php';

    $user = $_POST['username'];
    $pass = $_POST['password']; 

    $sql = "SELECT * FROM user WHERE userLogin=?";
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
                $_SESSION['activeLogin'] = $row['userLogin'];
                $_SESSION['activeID'] = $row['userID'];

                header("Location: ../index.php?login=successful");
                exit();
                
            }
            else if($pass != $row['userPass'])
            {
                header("Location: ../index.php?error=wrongpass");
                exit();
            }

        }
        else {
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

    
    }


}

else {
    header("Location: ../index.php");
    exit();
}



?>