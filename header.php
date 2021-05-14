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
    $USERNAME = $user_details['name'];
    $EMAIL = $user_details['email'];

    $sql="SELECT * from theme_color where id=1";
    if($result=$conn->query($sql))
    {
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc(); 
                $theme = $row; 
        }
    }


    // $websiteBackgroudColor="#d32f2f"; 
    $headingTextColorFirst=$theme['title_first_color'];
    $otherTextColor=$theme['other_text_color'];
    $headingTextColorSecond=$theme['title_second_color'];
    $websiteBackgroudColor=$theme['base_color']; 
    $headTopColor=$theme['top_header_color'];
    $headTopTextColor = $theme['head_text_color'];
    $headMiddle=$theme['bottom_header_color'];
    $videogalleryBackgroundColor=$theme['vg_bg_color'];
    $contestBackgroundColor=$theme['c_bg_color'];
    $contestButtonColor=$theme['c_button_color'];
    $contestButtonTextColor=$theme['c_button_text_color'];
    $footerBackgroundColor=$theme['f_bg_color'];
    $iconColor=$theme['icon_color'];
    $iconBackgroundColor=$theme['icon_bg_color'];
    $iconBorderColor=$theme['icon_border_color'];
    $comment_color=$theme['comment_color']
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/f662a74373.js" crossorigin="anonymous"></script>
        <!-- style css -->
        <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
        <?php
            require_once 'style.php' 
        ?>
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