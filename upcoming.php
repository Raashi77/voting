<?php
require_once "header.php";
require_once "navbar.php";
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
?>

       

        <!-- Inner Page Header serction start here -->
        <div class="inner-page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="header-page-title">
                            <h2>Upcoming Contests</h2>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- Inner Page Header serction end here -->

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
 
         
         
      <?php
      require_once "footer.php";
      require_once "js-links.php";
      ?>
