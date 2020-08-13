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
        $sql = "SELECT ";

    }

}



?>