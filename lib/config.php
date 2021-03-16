<?php

//opne server error
ini_set('display_errors', 1);
error_reporting(1);

//select time zone
date_default_timezone_set('Asia/Kolkata');

//for the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting";

// $username = "root_dubuddy";
// $password = "tnske1z}U6zR";
// $dbname = "voting_dubuddy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

 
// Check connection
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//website link
$website_link="http://localhost/voting"; 
//page value; 
?>