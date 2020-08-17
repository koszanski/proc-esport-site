<!--add username/fullname of the currently logged in person -->

<?php
session_start();
?>

<!DOCTYPE html>

<html>

    <head>
      
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">
            <img src="/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt=""> Talentulli
            </a>

                <?php
                    if(isset($_SESSION['activePlayerLogin'])){
                        echo '<form class="form-inline my-2 my-lg-0" action="/includes/logoutlogic.php" method="post">
                            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout Player</button>
                        </form>';
                    }
                    else if(isset($_SESSION['activeCoachLogin'])){
                        echo '<form class="form-inline my-2 my-lg-0" action="/includes/logoutlogic.php" method="post">
                            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout Coach</button>
                        </form>';
                    }
                    else if(isset($_SESSION['activeAdminLogin'])){
                        echo '<form class="form-inline my-2 my-lg-0" action="/includes/logoutlogic.php" method="post">
                            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout Admin</button>
                        </form>';
                    }
                    else{
                        echo '<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Not Logged in!</button>';
                    }
                ?>


            </div>
        </nav>
    </body>



</html>
