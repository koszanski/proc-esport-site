<?php
session_start();
?>

<!DOCTYPE html>
<!--this page is for a navbar/header that is applied to almost all pages (excluding login page).
has somewhat basic functionality, but can be expanded with more links--->
<html>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <!---image of the talentulli logo links to the login page which automatically redirects to the user's respective landing page.--->
            <a class="navbar-brand" href="../../index.php">
            <img src="/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt=""> Talentulli
            </a>
                <?php
                //if a post-login session variable is set, it'll cycle through each user type and accordingly display the loginname of each user in the logout prompt.
                //the structure of elif statements can also be used to populate links appropriate to each user type, such as of the ones that you would see on the landing page.
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
                    //if somehow you manage to access a page that doesn't kick you to login, and has a header included,
                    //you will see this prompt. This was first used as an early debug mechanism of verifying whether one is logged in
                    //when the header was included in the login page and no other pages were added.
                    else{
                        echo '<button class="btn btn-outline-secondary" type="submit">Not Logged in!</button>';
                    }
                ?>


            </div>
        </nav>
    </body>



</html>
