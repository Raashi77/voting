
<?php

//opne server error
ini_set('display_errors', 1);
error_reporting(1);

//select time zone
date_default_timezone_set('Asia/Kolkata');

//for the databas
$servername = "localhost";
$username = "root";
$password = "Kod#@}blaze245#~";
//Kod#@}blaze245#~
$dbname = "voting";

// $username = "root_dubuddy";
//$password = "";
// $dbname = "voting_dubuddy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

//website link
$website_link="https://kodiblaze.com";

$paypalConfig = [
    'email' => 'vansh10patpatia@gmail.com',
    'return_url' => 'http://localhost/voting/payment-successful.php',
    'cancel_url' => 'http://localhost/voting/payment-cancelled.php',
    'notify_url' => 'http://localhost/voting/payments.php'
];

$enableSandbox = true;

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

//page value; 
?>