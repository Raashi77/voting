<?php
    require_once "header_new.php";
    require_once "navbar_new.php";


    $action = $_GET['action'];



    // code for ongoing contest
    if($action == "ongoing"){

        $date=date('Y-m-d');
        $time = date('H:i');
        $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id ";
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

        $sql="select c_id from videos v where v.u_id='$USER_ID'";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row = $result->fetch_assoc())
                {
                    $joined_contest[] = $row['c_id'];
                }
                 
            }
        }

    }
    // ongoing end


    // code for upcoming contest

        if($action == "upcoming"){

            $date=date('Y-m-d');
            $time = date('H:i');
            $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time > '$time') or (c.start_date > '$date')) and c.id=i.c_id ";
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

            $sql="select c_id from videos v where v.u_id='$USER_ID'";
            if($result =  $conn->query($sql))
            {
                if($result->num_rows)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $joined_contest[] = $row['c_id'];
                    }
                     
                }
            }

        }

    // upcoming contest end




 ?>
<style>
.textDiv_Days{position:absolute;top:41px;left:58px!important}
.textDiv_Hours{position:absolute;top:41px;left:185px!important}
.textDiv_Minutes{position:absolute;top:41px;left:300px!important}
.textDiv_Seconds{position:absolute;top:41px;left:430px!important}
@media only screen and (max-width: 600px) {
  
    .textDiv_Days{position:absolute;top:35px;left:12vw!important}
    .textDiv_Hours{position:absolute;top:35px;left:36vw!important}
    .textDiv_Minutes{position:absolute;top:35px;left:58vw!important}
    .textDiv_Seconds{position:absolute;top:35px;left:80vw!important}
}
</style>


     <!-- Contest page wala triangle -->
   <!--  <section class="wrapperforaudio" style="height:80vh;">
           
            <div class="box1 box2">
             <img src="assets/image/shadowtriangle.png" class="img-fluid" alt="Image">
            </div>

            <div class="box1 box3 mx-0 px-0">
                 <h2 class="text-light p-5 px-0 mx-0 mt-3">
                     <?php 

                        if($action == "ongoing"){
                            echo "Ongoing contest";
                        } else if($action == "upcoming") {
                            echo "Upcoming Contest";
                        } else {
                            echo "Not Valid Action!";
                        }

                      ?>
                 </h2>
            </div>

            
        </section> -->
        <!-- end contest page wala trianagle -->


        <!-- contest page header part -->

        <div class="py-5" style="background-color: #212529">
            <div class="text-center">
                <h1 class="text-light py-5" style="font-family: Deadly;">
                   <?php 

                      if($action == "ongoing"){
                          echo "Ongoing contest";
                      } else if($action == "upcoming") {
                          echo "Upcoming Contest";
                      } else {
                          echo "Not Valid Action!";
                      }

                    ?> 
                </h1>
            </div>
        </div>

        <!-- header title part end -->


        <!-- ongoing contest content start -->
        <?php 

            if($action == "ongoing"){ ?>


                        <!-- Photo Contests Liata Start Here -->
                        <div class="home-about-photo-contest-area pt-100 pb-100">
                            <div class="container">
                                <div class="row">

                                <?php
                                    if(isset($on_contest))
                                    {
                                        foreach($on_contest as $contest)
                                        {
                                              $date2 = $contest['end_date']." ".$contest['end_time'].":00";
                                                
                                            
                                ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-50">
                                                <div class="single-section">
                                                    <div class="section-img">
                                                        <img src="<?=$contest['header_image']?>" alt="single Images" />
                                                    </div>
                                                    <h3 class="headding-title"><?=$contest['name']?></h3>
                                                    <ul id="meta-text">
                                                        <li class="date"><i class="fa fa-calendar-check-o"></i><?php 
                                                $date=date_create($contest["start_date"]);
                                                echo date_format($date,"M d, Y")." ".$contest['start_time'];
                                            ?></li>
                                                        <li class="date"><i class="fa fa-calendar-times-o" aria-hidden="true"></i><?php 
                                                $date=date_create($contest["end_date"]);
                                                echo date_format($date,"M d, Y")." ".$contest['end_time'];
                                            ?></li>
                                                    </ul>
                                                    <div class="countdown-section">
                                                        <div class="row">
                                                            <div class="col-sm-11">
                                                                <div class="CountDownTimer" data-date="<?=$date2?>"></div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    
                                                    <p class="des"><?=$contest['description']?></p>
                                                    <div class="link-section">
                                                        <a href="contest<?=$contest['id']?>" class="read-btn primary-btn mr-10">View</a>
                                                    
                                                    <?php
                                                        if(isset($_SESSION['signed_in']))
                                                        {
                                                            if(isset($joined_contest))
                                                            {
                                                                if(in_array($contest['id'], $joined_contest))
                                                                {
                                                        ?> 
                                                                    <a href="videoadd?token=<?=$contest['id']?>" class="joni-btn primary-btn">Add Videos</a>     
                                                        <?php
                                                                }
                                                                else 
                                                                {
                                                        ?>
                                                                    <a href="videoadd?token=<?=$contest['id']?>" class="joni-btn primary-btn">Join For Free</a>
                                                                    
                                                        <?php
                                                                }
                                                            }
                                                            else
                                                            {
                                                        ?>
                                                                <a href="videoadd?token=<?=$contest['id']?>" class="joni-btn primary-btn">Join For Free</a>
                                                        <?php
                                                            }
                                                        } 
                                                        else
                                                        {
                                                    ?>
                                                            <a href="registration" class="joni-btn primary-btn">Join For Free</a>
                                                                   
                                                    <?php
                                                        }
                                                    
                                                    ?>
                                                     
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
                        <!-- About Photo Contests End Here -->


            <?php } ?>
        <!-- ongoing contest content end -->



        <!-- upcoming contest content start -->

        <?php 

            if($action == "upcoming"){ ?>

                        <!-- Photo Contests Liata Start Here -->
                        <div class="home-about-photo-contest-area pt-100 pb-100">
                            <div class="container">
                                <div class="row">

                                <?php
                                    if(isset($on_contest))
                                    {
                                        foreach($on_contest as $contest)
                                        {
                                              $date2 = $contest['start_date']." ".$contest['start_time'].":00";
                                                
                                            
                                ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-50">
                                                <div class="single-section">
                                                    <div class="section-img">
                                                        <img src="<?=$contest['header_image']?>" alt="single Images" />
                                                    </div>
                                                    <h3 class="headding-title"><?=$contest['name']?></h3>
                                                    <ul id="meta-text">
                                                        <li class="date">Starts On : <i class="fa fa-calendar-check-o"></i><?php 
                                                $date=date_create($contest["start_date"]);
                                                echo date_format($date,"M d, Y")." ".$contest['start_time'];
                                            ?></li>
                                                      
                                                    </ul>
                                                    <div class="countdown-section">
                                                        <div class="row">
                                                            <div class="col-sm-11"><div class="CountDownTimer" data-date="<?=$date2?>"></div></div>
                                                        </div>
                                                    </div>
                                                    <p class="des"><?=$contest['description']?></p>
                                                   
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                                
                                     
                                </div>
                            </div>
                        </div>
                        <!-- About Photo Contests End Here -->

            <?php }

         ?>


        <!-- upcoming contest content end -->





 <?php 
         require_once "footer_new.php";
         require_once "js-links.php";
         require_once "javascript.php";
         // require_once "js-links.php";
 ?>