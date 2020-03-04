<?php


//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'cms');

//get connection
$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check connection
if(!$connection){
    die("Connection failed: " . $mysqli->error);
} else {
    //echo "We are connected!";
}

?>