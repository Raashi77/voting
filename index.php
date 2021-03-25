<?php
require_once "header.php";
require_once "navbar.php";
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
   
    $sql="select * from videos order by time_stamp desc limit 6";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $videos[] = $row;
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
    $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id limit 8";
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


    
?>



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
                    <video autoplay  muted style="width:100%">
                        <source src="admin/<?=$data['image']?>" type="<?=$data['file_type']?>">
                    </video> 
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
                            <li class="acitve"><a href="<?=$data['link']?>">Click Here <i
                                        class="fa fa-angle-right"></i></a></li>
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

<div class="fix home-blog-area pb-90 pt-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>Video<span>Gallery</span></h2>
                </div>
            </div>
        </div>
        <div class="blog-slider">
            <?php
                if(isset($videos))
                {
                    foreach($videos as $data)
                    {
                ?>
            <div class="single-blog-slide">
                <div class="images">
                    <a href="admin/<?=$data['video']?>"> <video src="admin/<?=$data['video']?>" style="width:500px!important;height:300px!important"></video> </a>
                </div>
            </div>
            <?php
                    }
                }
                ?>

        </div>
    </div>
</div>




<div class="row grid">
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
                                        
                                        $date1 = $contest['start_date']." ".$contest['start_time'].":00";
                                        $date2 = $contest['end_date']." ".$contest['end_time'].":00"; 
                                        $diff = abs(strtotime($date2) - strtotime($date1));
                                ?>
                            <li>
                                <div class="item">
                                    <div class="about-image">
                                        <img src="<?=$data['header_image']?>" alt="">
                                    </div>
                                    <div class="about-text">
                                        <h3><a href="contest.php?token=<?=$data['id']?>"><?=$data['name']?></a></h3>
                                        <p><?=$data['description']?></p>
                                        <a href="contest<?=$data['id']?>">Visit Contest <i
                                                class="fa fa-angle-right"></i></a>
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
                <img class="normal" src="admin/<?=$web_config['feature_image']?>" alt="">
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
                    <a href="viewBlog<?=$data['id']?>"><img src="<?=$data['image']?>"
                            style="width:250px!important;height:250px!important" alt=""></a>
                </div>
                <div class="blog-informations">
                    <!-- <ul>
                                    <li><i class="fa fa-user"></i> By Admin</li>
                                </ul> -->
                    <div class="blog-details">
                        <h3><a href="viewBlog<?=$data['id']?>"><?=$data['name']?></a></h3>
                        <p><?=$data['short_des']?></p>
                        <div class="read-more">
                            <a href="viewBlog<?=$data['id']?>">Read More</a>
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

<!-- Footer Area Section End Here -->

<?php
      require_once "footer.php";
      require_once "js-links.php";
      ?>