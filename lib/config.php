
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
//Kod#@}blaze245#~
$dbname = "voting";

// $username = "root_dubuddy";
// $password = "";
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

// $mail = new PHPMailer(); 
// $mail->SMTPDebug = false;               // Enable verbose debug output
// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'mail.kodiblaze.com';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'info@kodiblaze.com';                 // SMTP username
// // $mail->Password = '${ZULymF5Ur+';                            // SMTP password
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465;                                    // TCP port to connect to

// $mail->setFrom('info@kodiblaze.com', 'KodiBlaze');
// // $mail->addReplyTo('No Reply Please', 'Information');

//    // Optional name
//page value;


$mail = new PHPMailer(); 
$mail->SMTPDebug = true;               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.tattbooking.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@tattbooking.com';                 // SMTP username
$mail->Password = '${ZULymF5Ur+';                            // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to




$mail->setFrom('info@tattbooking.com', 'Tatt Book');
?>