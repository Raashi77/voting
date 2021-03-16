<?php
    require_once "lib/core.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['sign_up']))
        {
            $email=$_POST['email'];
            $name=$_POST['name'];
            $mobile=$_POST['mobile'];
            $ip_address=get_client_ip();
            $password=md5($_POST['password']);
            $sql="select * from users where email='$email'";
            if($result =  $conn->query($sql))
            {
                if($result->num_rows>0)
                {
                    $errorMember="User with this email id already exist. Try another.";
                }
                else
                {
                    $sql = "insert into users(name, email,password, mobile, ip_address, status) values('$name', '$email', '$password', '$mobile', '$ip_address', 1)";
                    if($conn->query($sql))
                    {
                        $resMember="User Registered Successfully";   
                    }
                    else
                    {
                        $errorMember=$conn->error;
                    }
                }
            }    
            
        }  
    }
?>

<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from rstheme.com/products/html/shooter/shooter-html/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Mar 2021 17:04:56 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Shooter | Registration</title>
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
        <!-- lightbox css -->
        <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
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
    <body class="registration">
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
                                    <li><i class="fa fa-phone"></i><a href="tel:+985-2356-14566">+985-2356-14566</a></li>
                                    <li><i class="fa fa-envelope-o"></i><a href="mailto:yourmail@gmail.com">yourmail@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="right-side-tool text-right">
                                <div class="social-media-area">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-users"></i><a href="registration.html">Login/Registration</a></li>
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
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="logo-area">
                                <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index2.html">Home Two</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About <i class="fa fa-angle-down"></i></a> 
                                            <ul>
                                                <li><a href="about.html">About Us</a> 
                                                <li><a href="about-me.html">About Me</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Portfolio <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="portfolio1.html">Portfolio 1</a></li>
                                                <li><a href="portfolio2.html">Portfolio 2</a></li>
                                                <li><a href="single-portfolio.html">Portfolio Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.html">Gallery  <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="gallery.html">Gallery One</a></li>
                                                <li><a href="gallery1.html">Gallery Two</a></li>
                                                <li><a href="gallery2.html">Gallery Three</a></li>
                                            </ul>
                                        </li>
                                        <li class="active"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="photocontest-list1.html">Photo Contest List 1</a></li>
                                                <li><a href="photocontest-list2.html">Photo Contest List 2</a></li>
                                                <li><a href="single-contest1.html">Single Contest 1</a></li>
                                                <li><a href="single-contest2.html">Single Contest 2</a></li>
                                                <li><a href="photo-details.html">Photo Details</a></li>
                                                <li><a href="winners.html">Winners</a></li>
                                                <li><a href="single-winners.html">Winners Details</a></li>
                                                <li><a href="upload-photo.html">Upload Photo</a></li>
                                                <li><a href="registration.html">Registration</a></li>
                                                <li><a href="404.html">Error Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-left.html">Blog Left Sidebar</a></li>
                                                <li><a href="blog-right.html">Blog Right Sidebar</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-12">
                            <div class="cart-area">
                                <a href="cart.html"><i class="fa fa-shopping-basket"></i><span>3</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide Menu Section Start Here -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index2.html">Home Two</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About <i class="fa fa-angle-down"></i></a> 
                                            <ul>
                                                <li><a href="about.html">About Us</a> 
                                                <li><a href="about-me.html">About Me</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Portfolio <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="portfolio1.html">Portfolio 1</a></li>
                                                <li><a href="portfolio2.html">Portfolio 2</a></li>
                                                <li><a href="single-portfolio.html">Portfolio Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.html">Gallery  <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="gallery.html">Gallery One</a></li>
                                                <li><a href="gallery1.html">Gallery Two</a></li>
                                                <li><a href="gallery2.html">Gallery Three</a></li>
                                            </ul>
                                        </li>
                                        <li class="active"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="photocontest-list1.html">Photo Contest List 1</a></li>
                                                <li><a href="photocontest-list2.html">Photo Contest List 2</a></li>
                                                <li><a href="single-contest1.html">Single Contest 1</a></li>
                                                <li><a href="single-contest2.html">Single Contest 2</a></li>
                                                <li><a href="photo-details.html">Photo Details</a></li>
                                                <li><a href="winners.html">Winners</a></li>
                                                <li><a href="single-winners.html">Winners Details</a></li>
                                                <li><a href="upload-photo.html">Upload Photo</a></li>
                                                <li><a href="registration.html">Registration</a></li>
                                                <li><a href="404.html">Error Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-left.html">Blog Left Sidebar</a></li>
                                                <li><a href="blog-right.html">Blog Right Sidebar</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header area end here-->
        
        <!-- Inner Page Header serction start here -->
        <div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Login and Registration</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index.html">Home /</a> Login and Registration</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Page Header serction end here -->

        <!-- Login and Registration start Here -->
        <div class="loginregistration-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
                        <div class="login-area">
                            <h2>Login</h2>
                            <form>
                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>User Name *</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="connected-area">
                                                <p>Connect With:</p>
                                                <div class="social-media">
                                                    <ul>
                                                        <li><img src="images/facebook.png" alt=""></li>
                                                        <li><img src="images/google.png" alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Remember me
                                                    </label>
                                                    <p><a href="#">Lost your password?</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn-send" type="submit">Login</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="registration-area">
                            <h2>Registration</h2>
                            <form>
                                <fieldset>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>User Name *</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Confirm Password</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> E-mail</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn-send" type="submit">Sign Up!</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login and Registration End Here -->

        <!-- Footer Area Section Start Here -->
        <footer>
            <div class="footer-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="single-footer footer-one">
                                <h3>About Company</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum repellat, maxime vel alias impedit veritatis temporibus, sequi quos veniam eius optio corporis modi dicta molestias at inventore culpa, natus explicabo.</p>
                                <div class="footer-social-media-area">
                                    <nav>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 hidden-sm">
                            <div class="single-footer footer-two">
                                <h3>Twitter Feed</h3>
                                <nav>
                                    <ul>
                                        <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">https://twitter.com/?lang=en</a>
                                            <br/> 3 days ago
                                        </li>
                                        <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">https://twitter.com/?lang=en</a>
                                            <br/> 3 days ago
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 hidden-md col-sm-12">
                            <div class="single-footer footer-three">
                                <h3>Flickr Photos</h3>
                                <ul>
                                    <li>
                                        <a href="#"><img src="images/flicker/1.png" alt="flicker photo"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/flicker/2.png" alt="flicker photo"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/flicker/3.png" alt="flicker photo"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/flicker/4.png" alt="flicker photo"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/flicker/5.png" alt="flicker photo"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/flicker/6.png" alt="flicker photo"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="single-footer footer-four margin-0">
                                <h3>Corporate Office</h3>
                                <nav>
                                    <ul>
                                        <li><i class="fa fa-paper-plane-o"></i> 44 New Design Street, rne 00 USA</li>
                                        <li><i class="fa fa-phone"></i> <a href="tel:+985-2356-14566">+985-2356-14566</a></li>
                                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:yourmail@gmail.com">yourmail@gmail.com</a></li>
                                        <li><i class="fa fa-fax"></i> Fax: (123) 4589761</li>
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
                        <div class="col-lg-12 col-md-12 col-sm-12">
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
        <!-- jQuery Multistep form -->
        <script src="js/multi_step_form.js"></script>
        <!-- jquery.fancybox.pack js -->
        <script src="inc/fancybox/jquery.fancybox.pack.js"></script>
        <!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- jquery weave effects -->
        <script src="js/waves.js"></script>
        <!-- main js -->
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from rstheme.com/products/html/shooter/shooter-html/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Mar 2021 17:04:56 GMT -->
</html>