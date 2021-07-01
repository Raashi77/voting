<?php
    require_once "header_new.php";
    require_once "navbar_new.php";

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
?>
        <!-- <div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2 class="text-light" style="font-family: Deadly;">About</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="index">Home /</a> About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Inner Page Header serction end here -->



             <!-- about us wala triangle -->
            <!-- <section class="wrapperforaudio" style="height:40vh;">
                   
                    <div class="box1 box2">
                     <img src="assets/image/shadowtriangle.png" class="img-fluid" alt="Image">
                    </div>

                    <div class="box1 box3">
                         <h2 class="text-light mt-5 ml-4 mr-5 pr-5">About Us</h2>
                    </div>

                    
                </section> -->
                <!-- about us wala trianagle -->






        <!-- Home About Start Here -->
        <div class="home-about-area pt-90 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md--12 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-content">
                            <h1 class="text-light" style="font-family: Deadly;">About US</h1>
                            <p class="text-light"><?=html_entity_decode($web_config['about'])?></p>
                            <!-- <div class="about-content-list row">
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
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 hidden-md hidden-sm wow fadeInRight" data-wow-delay="0.2s">
                        <div class="about-featured-image">
                            <img src="admin/<?=$web_config['image']?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Home About End Here -->

        <!-- home page core services start here -->
        <!-- <div class="container-fluid acurate">
            <div class="home-page-core-activities-area">
                <div class="row acurate">
                    <div class="col-lg-6 col-md-12 acurate">
                        <img class="normal" src="admin/<?=$web_config['feature_image']?>" alt="">
                        <img class="tablate" src="images/activities-bg1.jpg" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 acurate">
                        <div class="home-activities-area">
                           
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
                                                <h4 class="media-heading" style="font-family: Deadly;"><a href="#"><?=$data['name']?></a></h4>
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
        </div> --> 




            <section>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 text-center bg-light">
                            <img class="img-fluid" src="admin/<?=$web_config['feature_image']?>" alt="">
                            
                        </div>
                        <div class="col-lg-6 col-md-6 text-light justify-content-center align-self-center">



                            <?php
                            if(isset($features))
                            {
                                foreach($features as $data)
                                {
                            ?>
                                    <div class="pl-5 mt-5 d-flex">
                                            <div>
                                                <a href="#">
                                                    <i class="<?=$data['icon']?> m-3 text-light" style="font-size: 38px;"></i>
                                                </a>
                                            </div>
                                            <div class="ml-3">
                                                <h4 style="font-family: Deadly;"><a class="text-light" href="#"><?=$data['name']?></a></h4>
                                                <p><?=$data['description']?></p>
                                            </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </section>


    <?php 
            require_once "footer_new.php";
            require_once "javascript.php";
    ?>