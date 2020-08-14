<?php 
if (isset($_POST['admin-adduser-submit'])) {

    require 'includes/dbconfig.php';

    $user = $_POST['userlogin'];
    $pass = $_POST['userpasswd'];
    $passconf = $_POST['userpasswdconf']; 
    $name = $_POST['userfullname']; 

    if (empty($user) || empty($pass) || empty($passconf)|| empty($name)) {
        header("Location: ../adminpanel.php?error=emptyfields");
        exit();
    }
    else if ($pass !== $passconf) {
        header("Location: ../adminpanel.php?error=passmismatch");
        exit();
    }
    else {
        $sql = "SELECT userLogin FROM user WHERE userLogin=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../adminpanel.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultchecker = mysqli_stmt_num_rows($stmt);

            if ($resultchecker > 0)
            {
                header("Location: ../adminpanel.php?error=nametaken");
                exit();
            }
            else {

                $sql = "INSERT INTO user (userLogin, userPass, userName) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_repare($stmt, $sql)) {
                    header("Location: ../adminpanel.php?errror=sqlerror");
                    exit();
                }
                else {
                    
                }

            }
        }
    }

}



?>