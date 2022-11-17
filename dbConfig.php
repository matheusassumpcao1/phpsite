<?php
//Database config
$dbHost = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "user_registration";

//Database connection
$db = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);

//Check connection
if ($db -> connect_error) {
    die("Connection failed: ". $db->connect_error);
}
