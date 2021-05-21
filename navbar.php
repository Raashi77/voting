 <!--Header area start here-->
 <style>
     .dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
/* #indexmenu{padding-right:20px} */
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.mean-bar{margin-top:-61px}
#headnavbar{width:107%}
/* .mean-bar{display:none} */
 </style>
 <header id="headnavbar">
            <div class="header-top-area hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 ">
                            <div class="header-top-left">
                                <ul>
                                    <li><i class="fa fa-phone"></i><a href="tel:+985-2356-14566"><?=$web_config['phn']?></a></li>
                                    <li><i class="fa fa-envelope-o"></i><a href="mailto:<?=$web_config['email']?>"><?=$web_config['email']?></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 ">
                            <div class="right-side-tool text-right">
                                <div class="social-media-area">
                                    <ul>
                                        <li><a href="https://www.facebook.com/kodi.blaze.7"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/kodiblaze?lang=en"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://www.instagram.com/kodiblaze/?hl=en"><i class="fa fa-instagram"></i></a></li>
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
                                <a href="index"><img src="admin/<?=$web_config['logo']?>" width="100px" height="100px" style="margin-bottom:10px" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index">Home</a> </li>
                                        <li><a href="#">Contests</a>
                                            <ul>
                                            <li><a href="contest-list">Ongoing</a></li>
                                            <li><a href="upcoming">Upcoming</a></li>
                                            </ul>
                                        </li>
                                         <li><a href="about">About</a></li>
                                        <?php
                                        if(isset($_SESSION['signed_in']))
                                        {
                                        ?>
                                            
                                            <li><a href="#">Songs</a>
                                                <ul>
                                                <li><a href="allsongs">All songs</a></li>
                                                <li><a href="yoursongs">My songs</a></li>
                                                </ul>
                                            </li>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <li><a href="allsongs">Songs</a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a href="blog_home">Blog</a></li>
                                        <li><a href="contact">Contact Us</a></li>
                                    <?php
                                    if(isset($_SESSION['signed_in']))
                                    {
                                    ?>
                                        
                                        <li><a href="#" class="btn btn-danger" style="background-color: <?=$websiteBackgroudColor?>;color:white">Welcome! <?=$_SESSION['name']?><i class="fa fa-angle-down"></i></a>
                                            <ul>
                                            <li><a href="my_contests">My Contests</a></li>
                                            <li><a href="logout">Log Out</a></li>
                                            </ul>
                                        </li>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <li> <a href="registration" class="btn btn-danger"  style="background-color:<?=$websiteBackgroudColor?>;color:white">Login</a></li>
                                    <?php
                                    }
                                    ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <!-- Slide Menu Section Start Here -->
               <div class="mobile-menu-area" id="indexmenu" >
                    <div class="section-title" style='padding-left:10px;padding-right:10px;padding-top:10px' id="webtitle">
                        <h4 style=""><?=$web_config['home_title']?></h4>
                    </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="mobile-menu">
                                
                                <nav id="dropdown" style="position:relative;top:-57px">
                                <ul >
                                        <li><a href="index">Home</a> </li>
                                        <li><a href="#">Contests</a>
                                            <ul>
                                            <li><a href="contest-list">Ongoing</a></li>
                                            <li><a href="upcoming">Upcoming</a></li>
                                            </ul>
                                        </li>
                                         <li><a href="about">About</a></li>
                                        <?php
                                        if(isset($_SESSION['signed_in']))
                                        {
                                        ?>
                                            
                                            <li><a href="#">Songs</a>
                                                <ul>
                                                <li><a href="allsongs">All songs</a></li>
                                                <li><a href="yoursongs">My songs</a></li>
                                                </ul>
                                            </li>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <li><a href="allsongs">Songs</a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a href="blog_home">Blog</a></li>
                                        <li><a href="contact">Contact Us</a></li>
                                     
                                        <!-- <li class="active"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
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
                                        </li> -->
                                        <!-- <li><a href="blog_home">Blog</a></li>
                                        <li><a href="contact">Contact Us</a></li>
                                       -->
                                        
                                    <?php
                                    if(isset($_SESSION['signed_in']))
                                    {
                                    ?>
                                        
                                        <li><a href="#" class="btn btn-danger" style="background-color:<?=$websiteBackgroudColor?>;color:white">Welcome! <?=$_SESSION['name']?><i class="fa fa-angle-down"></i></a>
                                            <ul>
                                            <li><a href="my_contests">My Contests</a></li>
                                            <li><a href="logout">Log Out</a></li>
                                            </ul>
                                        </li>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <li> <a href="registration" class="btn btn-danger" style="background-color:<?=$websiteBackgroudColor?>;color:white">Login</a></li>
                                    <?php
                                    }
                                    ?>
                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header area end here-->
