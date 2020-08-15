<?php 
if (isset($_POST['login-submit'])) {

    require 'dbconfig.php';

    $user = $_POST['username'];
    $pass = $_POST['password']; 

    if (empty($user) || empty($pass)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        # code...
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
                $passcheck = password_verify($pass, $row['userPass']);
                if ($passcheck == true) {
                    session_start();
                    $_SESSION['activeLogin'] = $row['userLogin'];
                    $_SESSION['activeID'] = $row['userID'];

                    header("Location: ../index.php?login=successful");
                    exit();
                    
                }
                else if($passcheck == false)
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

}

else {
    header("Location: ../index.php");
    exit();
}



?>