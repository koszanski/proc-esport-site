<?php
//linked to the logout button, this form unbinds and destroys the current session to fully logout.
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");

?>