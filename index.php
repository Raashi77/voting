<?php
require_once "lib/core.php";
    $sql="select * from home_slider";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $slider[] = $row;
            }
        }
    }
    $sql="select header_image from index_changes limit 6";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $contest[] = $row;
            }
        }
    }
    $sql="select * from features";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $features[] = $row;
            }
        }
    }
    $sql="select * from blogs order by timestamp desc limit 4";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $blog[] = $row;
            }
        }
    }
    $date=date('Y-m-d');
        $time = date('H:i');
    $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $on_contest[] = $row;
            }
        }
    }

    $sql="select * from web_config where id=1";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                 $web_config = $row;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from rstheme.com/products/html/shooter/shooter-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Mar 2021 17:03:52 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Voting</title>
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
        <!--Header area start here-->
        <header>
            <div class="header-top-area hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="header-top-left">
                                <ul>
                                    <li><i class="fa fa-phone"></i><a href="tel:+985-2356-14566"><?=$web_config['phn']?></a></li>
                                    <li><i class="fa fa-envelope-o"></i><a href="mailto:yourmail@gmail.com"><?=$web_config['email']?></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="right-side-tool text-right">
                                <div class="social-media-area">
                                    <ul>
                                        <li><a href="<?=$web_config['facebook']?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?=$web_config['twitter']?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?=$web_config['instagram']?>"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-users"></i><a href="user/sign_up">Login/Registration</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle-area" id="sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="logo-area">
                                <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
        <!--Header area end here-->

        <!-- Slider Area Start Here-->
        <div class="slider-area">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides">
                <?php
                if(isset($slider))
                {
                    foreach($slider as $data)
                    {
                ?>
                        <img src="<?=$data['image']?>" alt="" title="#slider-direction-1" />
                <?php
                    }
                ?>
                </div>
                <?php
                    foreach($slider as $data)
                    {
                ?>
                <div id="slider-direction-1" class="slider-direction">
                    <div class="slider-content t-cn s-tb slider-1">
                        <div class="title-container s-tb-c">
                            <h1 class="title1" style="color: <?=$data['color']?>"><span><?=$data['heading']?></span></h1>
                            <div class="title2" style="color: <?=$data['color']?>"><?=$data['sub_heading']?></div>
                            <div class="slider-botton">
                                <ul>
                                    <li class="acitve"><a href="<?=$data['link']?>">About Us <i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <!-- Slider Area End Here-->

        <!-- Home Page About Us area start here -->
        <div class="home-about-area pt-90 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md--12 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-content">
                            <h3>About <span>US</span></h3>
                            <p><?=$web_config['about']?></p>
                            <div class="about-content-list row">
                                <div class="single-list col-lg-12 col-md-6 col-sm-12 mb-sm-30">
                                    <div class="media">
                                        <div class="pull-left">
                                            <a href="#"><i class="fa fa-files-o"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">HD Resulation</a></h4>
                                            <p>Lorem Ipsum text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-list col-lg-12 col-md-6 col-sm-12">
                                    <div class="media">
                                        <div class="pull-left">
                                            <a href="#"><i class="fa fa-camera"></i></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Camra Shop</a></h4>
                                            <p>Lorem Ipsum text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 hidden-md hidden-sm wow fadeInRight" data-wow-delay="0.2s">
                        <div class="about-featured-image">
                            <img src="<?=$web_config['image']?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Photo Contests End Here -->

        <!-- Portfolio One Start Here -->
        <div class="portfolio-one-area pb-70 pt-90">
            <div class="container">
                <div class="section-title">
                    <h2>Our Photo<span> Gallery</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                <!-- .gridFilter end-->
                        <div class="row grid">
                            <!-- single portfolio start -->
                            <?php
                            if(isset($contest))
                            {
                                foreach($contest as $data)
                                {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-30 grid-item graphics">
                                <div class="single-portfolio">
                                    <div class="portfolio-image">
                                        <img src="<?=$data['header_image']?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio One End Here -->

        <!-- Single Photo Contest Start Here -->
        <div class="home-single-contest gray-bg pt-90 pb-90">
            <div class="home-single single-photo-contest-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <div class="section-title">
                                <h2>Our Running <span>Contests</span></h2>
                            </div>                   
                            <div class="about-content">
                                <h2>Running Contests</h2>
                                <ul class="home-single-slide variation">
                                <?php
                                if(isset($on_contest))
                                {
                                    foreach($on_contest as $data)
                                    {
                                ?>
                                    <li>
                                        <div class="item">
                                            <div class="about-image">
                                                <img src="<?=$data['header_image']?>" alt="">
                                            </div>
                                            <div class="about-text">
                                                <h3><a href="single-contest2.html"><?=$data['name']?></a></h3>
                                                <p><?=$data['description']?></p>
                                                <a href="#">Register Now <i class="fa fa-angle-right"></i></a>
                                            </div>  
                                        </div>                                  
                                    </li>
                                <?php
                                    }
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <!-- Single Photo Contest End Here -->        

        <!-- Home page core services start here -->
        <div class="container-fluid acurate">
            <div class="home-page-core-activities-area">
                <div class="row acurate">
                    <div class="col-lg-6 col-md-12 acurate">
                        <img class="normal" src="<?=$web_config['feature_image']?>" alt="">
                        <img class="tablate" src="images/activities-bg1.jpg" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 acurate">
                        <div class="home-activities-area">
                            <h2>Contest Features</h2>
                            <?php
                            if(isset($features))
                            {
                                foreach($features as $data)
                                {
                            ?>
                                    <div class="single-activities">
                                        <div class="media">
                                            <div class="pull-left">
                                                <a href="#">
                                                    <i class="<?=$data['icon']?>"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#"><?=$data['name']?></a></h4>
                                                <p><?=$data['description']?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Home page core services end here -->

        <!-- Home Blog Start Here -->
        <div class="fix home-blog-area pb-90 pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h2>Recent <span>Blogs</span></h2>
                        </div>
                    </div>
                </div>
                <div class="blog-slider">
                <?php
                if(isset($blog))
                {
                    foreach($blog as $data)
                    {
                ?>
                        <div class="single-blog-slide">
                            <div class="images">
                                <a href="#"><img src="<?=$data['image']?>" alt=""></a>
                            </div>
                            <div class="blog-informations">
                                <ul>
                                    <li><i class="fa fa-user"></i> By Admin</li>
                                </ul>
                                <div class="blog-details">
                                    <h3><a href="#"><?=$data['name']?></a></h3>
                                    <p><?=$data['short_des']?></p>
                                    <div class="read-more">
                                        <a href="view_blog?token=<?=$data['id']?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                    
                </div>
            </div>
        </div>
        <!-- Home Blog End Here -->

        <footer>
            <div class="footer-top-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="single-footer footer-one">
                                <h3>About Company</h3>
                                <p><?=$web_config['about']?></p>
                                <div class="footer-social-media-area">
                                    <nav>
                                        <ul>
                                            <li><a href="<?=$web_config['facebook']?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?=$web_config['twitter']?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?=$web_config['instagram']?>"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="single-footer footer-four margin-0">
                                <h3>Corporate Office</h3>
                                <nav>
                                    <ul>
                                        <li><i class="fa fa-paper-plane-o"></i><?=$web_config['address']?></li>
                                        <li><i class="fa fa-phone"></i> <a href="tel:+<?=$web_config['phn']?>"><?=$web_config['phn']?></a></li>
                                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?=$web_config['email']?>"><?=$web_config['email']?></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="footer-bottom">
                                <p> &copy; Copyrights 2018. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area Section End Here -->

        <!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- jquery.counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <!-- jquery light box -->
        <script src="js/lightbox.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- magnific popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- jQuery MixedIT Up -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Counter Down js -->
        <script src="js/simplyCountdown.min.js"></script>
        <!-- Nivo slider js -->
        <script src="inc/custom-slider/js/jquery.nivo.slider.js"></script>
        <script src="inc/custom-slider/home.js"></script>
        <!-- jQuery Multistep form -->
        <script src="js/multi_step_form.js"></script>
        <!-- jquery.fancybox.pack js -->
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- jquery weave effects -->
        <script src="js/waves.js"></script>
		<!-- TimeCircles js -->
        <script src="js/TimeCircles.js"></script>
        <!-- main js -->
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from rstheme.com/products/html/shooter/shooter-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Mar 2021 17:04:33 GMT -->
</html>