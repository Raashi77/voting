<?php 

	require_once "./lib/core.php";

	$date=date('Y-m-d');
    $time = date('H:i');
    $sql="SELECT c.*, i.header_image from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id limit 4";
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
    else
    {
        $error= $conn->error;
    }   
    $sql="SELECT count(c.id) as ongoing from contest c, index_changes i where ((c.start_date = '$date' and c.start_time <= '$time') or (c.start_date < '$date' and c.end_date > '$date') or (c.end_date = '$date' and c.end_time >= '$time')) and c.id=i.c_id limit 6";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $ongoing = $result->fetch_assoc();       
        }
    }
    else
    {
        $error= $conn->error;
    } 
    // print_r($on_contest);
    $sql="select c_id from videos v where v.u_id='$USER_ID'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc());
            {
               $joined_contest[] = $row['c_id'];
            }
            
        }
    }
    else
    {
        $error= $conn->error;
    }
    $disp = "none";
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
	<base target="_parent">
	<style>
        #totop{display:none !important}
        .controls{bottom:-15px}
        @media only screen and (max-width: 600px)
        {
            .controls{bottom:30px}           
        }
    </style>
</head>





 <body style="overflow-y:hidden;overflow-x:hidden !important">


<!-- http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4 -->



 	<!-- our running contest -->
     <section class="wrapperforaudio">
 		           <div class="box1">
 		           	<div class="row audioslick mt-5 pt-5" style="margin-top:0 !important;padding-top:0 !important;">

                        <?php
                   if(isset($on_contest))
                   {
                       $disp = "";
                       if($ongoing['ongoing'] == 1)
                       {
                           $col = 12;
                           $disp = "none";
                       }
                       else if($ongoing['ongoing'] == 2)
                       {
                           $col = 6;
                           $disp = "none";
                       }
                       else if($ongoing['ongoing'] == 3)
                       {
                           $col = 4;
                           $disp = "none";
                       }
                       else if($ongoing['ongoing'] > 3)
                        {
                            $disp = "initial";
                        }                       

                       foreach($on_contest as $data)
                       {
                           
                           $date1 = date("M d Y",strtotime($data['start_date']))." ".$data['start_time'].":00";
                           $date2 = date("M d Y",strtotime($data['end_date']))." ".$data['end_time'].":00"; 
                        //    $diff = abs(strtotime($date2) - strtotime($date1));
                           $id = $data['id'];
                
                            if(isset($_SESSION['signed_in']))
                            {
                                if(isset($joined_contest))
                                {
                                    if(in_array($data['id'], $joined_contest)) 
                                    {
                                        $link = "videoadd?token=$id";
                                        $title = "Add Videos";
                            
                                    }
                                    else 
                                    {
                                        $link = "videoadd?token=$id";
                                        $title = "Join For Free";
                            
                                    }
                                } 
                                else
                                {
                                        $link = "videoadd?token=$id";
                                        $title = "Join For Free";
                          
                                }
                            }
                            else
                            {
                                $link = "registration";
                                $title = "Join For Free";
                        
                            }
                        
                        ?>

 		           	
 		           	<div class="col-lg-<?=$col?> mt-5">
 		           		<div class="p-4">

 		           			<div class="card" style="border-radius: 20px;">
 		           			  <img class="card-img-top p-2" src="<?=$data['header_image']?>" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
 		           			  <div class="card-body pb-0">
 		           			    <h3 class="card-title"><?=$data['name']?></h3>
 		           			    <div class="d-flex">
 		           			    	<p class="card-text mr-3"><small class="text-muted"><i class="far fa-calendar-check"></i> <?=$date1?></small></p>
 		           			    	<p class="card-text"><small class="text-muted"><i class="far fa-calendar-check"></i> <?=$date2?></small></p>
 		           			    </div>
 		           			    <p class="card-text"><?=$data['description']?></p>
 		           			  </div>
 		           			  <div class="text-center mb-2">
 		           			  	<button class="primary_button mt-3" style="font-size: 18px;cursor:pointer" onclick="{window.parent.location.href='contest<?=$id?>'}">View</button>
 		           			  	<button class="primary_button mt-3" style="font-size: 18px;cursor:pointer" onclick="{window.parent.location.href='<?=$link?>'}">Join For Free</button>
 		           			  </div>
 		           			</div>

 		           		</div>
 		           	</div>
 		           	<!-- lg-4 end -->
                    <?php
                        }
                    }
                    ?>
 		           	</div>
 		           </div>
 		           <div class="box1 box2">
 		           	<img src="assets/image/shadowtriangle.png" class="img-fluid" alt="Image">
 		           </div>

 		           <div class="box1 box3">
	 		           	<h2 class="text-light mr-5 pr-5">Our Running Contests</h2>
	 		           	<button class="primary_button mt-3">Ongoing</button>
 		           </div>

 		           
 		       </section>
                <div style=" padding-bottom: 50px;padding-top:0 !important;margin-top:0 !important;display:<?=$disp?>">
 		        	<div class="container-fluid" style="position:  absolute; bottom: 0; background-color: #1b191e">
 		        		<div class="container audiocontroller">
 		        			<div class="row text-center text-light">
 		        				<div class="col-4 pt-2">
 		        					<i class="fas fa-chevron-left" style="font-size: 34px;"></i>
 		        				</div>
 		        				<div class="col-4">
 		        					<p style="font-size: 34px; font-weight: bolder;">|</p>
 		        				</div>
 		        				<div class="col-4 pt-2">
 		        						<i class="fas fa-chevron-right" style="font-size: 34px;"></i>
 		        				</div>
 		        			</div>
 		        		</div>
 		        	</div>
 		        </div>
 			
                 
                       
 	<!-- our running end -->




 		<!-- blog section end -->


 <?php 
 		require_once "javascript.php";
  ?>
  