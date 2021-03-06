<?php 
ob_start();
  require_once "lib/core.php";
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $page = end($link_array);
  
  if(isset($_GET['token']) && !empty($_GET['token']) && $_GET['token']=='logout')
  {
        setcookie("new", '', time()-1000, "/");
        setcookie("pass", '', time()-1000, "/");
        session_destroy();
        
        ?>
<?php
  }
  if(isset($_POST['noti_btn']))
  {
      $noti_link = $conn->real_escape_string($_POST['noti_btn']);
      $noti_id = $conn->real_escape_string($_POST['noti_id']); 
      $sql="update notification set clicked=1 where id=$noti_id ";
      if($conn->query($sql))
      {
          header("Location:$noti_link");
      } 
  }
   
  if(!($page=="login.php" || $page=="signup.php" || $page=="forgot_pass.php" || $page=="st_cutoff.php"|| $page=="reset_password.php"|| $page=="blog.php"|| $page=="blog-detail.php"|| $page=="cuttoff2.php"))
  {
    if(!auth())
    {
        if(isset($_COOKIE['new']) && isset($_COOKIE['pass']))
        {
            $mode = cookie_login($conn);
            if($mode =="app_mode")
            {
                $APP_MODE_ACTIVATED=true;
            }
        }
        else if(isset($_GET['email']) && !empty($_GET['email'])&&isset($_GET['password']) && !empty($_GET['password']))
        {
            $getEmail  =$conn->real_escape_string($_POST['username']);
            $getPass  =$conn->real_escape_string($_POST['password']);
            if(app_login($getEmail,$getPass,$conn,2))
            {
                $APP_MODE_ACTIVATED=true;
            } 
        }
        else
        {
            header("Location: login.php");
        }
        
    }
  }
   $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              
if(isset($_POST['login']))
{
    $email  =$conn->real_escape_string($_POST['username']);
    $pass  =md5($conn->real_escape_string($_POST['password']));
     if(user_login($email,$pass,$conn,2,"index.php?token=set_idTag&email=$email"))
     {
         $loginRedirdect = "true";
         
     }
     else
     {
         $loginError = "true";
     }
}

if(isset($_POST['signUp']))
{
    
    $email = $conn->real_escape_string($_POST['email']);
    $name = $conn->real_escape_string($_POST['name']);
    $pass = md5($conn->real_escape_string($_POST['pass']));
    $gender = $conn->real_escape_string($_POST['gender']);
    $stream = $conn->real_escape_string($_POST['stream']);
    $instream = $conn->real_escape_string($_POST['intrested_stream']);
    $cat = $conn->real_escape_string($_POST['cat']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    
    $sql = "insert into users(email,password,type) values('$email','$pass','2')";
    if($conn->query($sql))
    {
        $insertId = $conn->insert_id;
        $sql = "insert into users_profile(u_id,name,category_id,gender,stream,stream_wanting,Mobile) values($insertId,'$name',$cat,'$gender','$stream','$instream','$mobile')";
        if($conn->query($sql))
        {
            
            $finalStatus=true;
            if(user_login($email,$pass,$conn,2,"index.php?token=set_idTag&email=$email"))
             {
                 $loginRedirdect = "true";
             } 

        }
        
    }
    
       
}
 
if(isset($_SESSION['signed_in']))
{
   $sql="select u.id,u.email,up.name,up.gender,up.stream,up.stream_wanting,c.category,up.category_id from users as u , users_profile as up,category as c where up.u_id=u.id and u.email='".$_SESSION['signed_in']."' and c.id = up.category_id;";
   $result = $conn->query($sql);
   if($result->num_rows)
   {    
       $USER_DATA = $result->fetch_assoc();
        
   }
  $USER_ID =  $USER_DATA['id'];
 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5Z4ZR6G');
    </script>
    <!-- End Google Tag Manager -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">

    <!--BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--FontAwosome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--    Select Picker Css -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!--    W3 Css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!--Google Gont Bebas Neue -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">-->
    <!-- Custom Style Sheet-->
    <!--<link rel="stylesheet" type="text/css" href="css/signup2.css">-->
    <!--<link rel="stylesheet" href="css/style.css">-->
    <!--<link rel="stylesheet" href="css/form.css">-->
    <link rel="stylesheet" type="text/css" href="css/edit.css?version=6">
    <link rel="stylesheet" href="css/front.css?version=15">
    <link rel="stylesheet" type="text/css" href="css/aboutCollage.css">
    <link rel="stylesheet" href="css/hostel.css?token=7">
    <link rel="stylesheet" href="css/home.css?token=7">
    <link rel="stylesheet" href="css/postShow.css?token=3">
    <link rel="stylesheet" href="css/gradient.css?v=13">
    <link rel="stylesheet" href="css/collage_probability_display.css?v=13">
    <link rel="stylesheet" href="css/duContact us.css?v=12">

    <title>Voting</title>
    <style>
    body {
        font-family: Arial;
        overflow-x: hidden;

    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        /*  background-color: inherit;*/
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .image {
        width: 100%;
        height: 400px;
    }


    .mySlides {
        display: none;
    }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Z4ZR6G" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->