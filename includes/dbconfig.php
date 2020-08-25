<?php
//global server variables are defined here to access the database.
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'esportorgdb');
 
//attempts to connect to the database.
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection, if it's dead, it will throw up an error with log
if($conn === false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}
?>