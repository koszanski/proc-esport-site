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
        # code...
        $sql = "SELECT userLogin FROM user WHERE userLogin=$user";
        $stmt = mysqli_stmt_init($conn);
    }

}



?>