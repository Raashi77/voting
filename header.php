<?php
    require_once "lib/core.php";
    $email=$_SESSION['signed_in'];
    $sql="select * from web_config where id=1";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                 $web_config = $row;
        }
    }
    if(isset($_SESSION['signed_in']))
    {
        $sql="select * from users where email='$email'";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows)
            {
                $row = $result->fetch_assoc();
                    $user_details = $row;
            }
            else if($result->num_rows==0)
            {
                session_destroy();
                header("location:registration");
            }
        }
    }
    $USER_ID=$user_details['id'];
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title><?=$web_config['web_title']?></title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!-- jquery-ui.min css -->
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
        <!-- meanmenu css -->
        <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" type="text/css" href="inc/custom-slider/css/nivo-slider.css">
        <link rel="stylesheet" type="text/css" href="inc/custom-slider/css/preview.css">
        <!-- lightbox css -->
        <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
		<!-- TimeCircles css -->
        <link rel="stylesheet" type="text/css" href="css/TimeCircles.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        
    </head>
    <body class="home">
        <!--Preview area start here-->
            <div class="template-preloader-rapper">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        <!--End preview here -->