<?php
session_start();
?>

<!DOCTYPE html>

<html>

    <head>
      
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="../../index.php">
            <img src="/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt=""> Talentulli
            </a>
                <?php
                    if(isset($_SESSION['activePlayerLogin'])){
                        echo '<form class="form-inline" action="/includes/logoutlogic.php" method="post">
                            <button class="btn btn-outline-danger" type="submit">Logout ' . $_SESSION['activePlayerLogin'] . '</button>
                        </form>';
                    }
                    else if(isset($_SESSION['activeCoachLogin'])){
                        echo '<form class="form-inline" action="/includes/logoutlogic.php" method="post">
                            <button class="btn btn-outline-danger" type="submit">Logout ' . $_SESSION['activeCoachLogin'] . ' </button>
                        </form>';
                    }
                    else if(isset($_SESSION['activeAdminLogin'])){
                        echo '<form class="form-inline" action="/includes/logoutlogic.php" method="post">
                            <button class="btn btn-outline-danger" type="submit">Logout ' . $_SESSION['activeAdminLogin'] . '</button>
                        </form>';
                    }
                    else{
                        echo '<button class="btn btn-outline-secondary" type="submit">Not Logged in!</button>';
                    }
                ?>


            </div>
        </nav>
    </body>



</html>
