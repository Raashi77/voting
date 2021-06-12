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
    $sql="select * from home_slider where id=1";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            
                $slider = $result->fetch_assoc();
        }
    }
    else
    {
        echo $conn->error;
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
    $comment_color=$theme['comment_color'];
    $home_title=$web_config['home_title'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kodi Blaze</title>


	<!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	 	 <!-- Slick CSS -->
	    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<!-- Shiv Style.css -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="icon" href="assets/image/logokb.png">
	<?php
		require_once 'style.php' 
	?>
	<style>#totop{display:none !important}</style>
</head>
<body style="overflow-x:hidden !important">
	
