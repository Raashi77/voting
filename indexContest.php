<?php 

	require_once "header_new.php";

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
        echo $conn->error;
    }   
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
        echo $conn->error;
    }
 ?>


				


 		


<!-- http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4 -->



 	<!-- our running contest -->
 		<section class="running_contest">

 		
 			<div class="wallimg" style="background-image: url(./assets/image/wall.png);">
 				<img src="assets/image/shadowtriangle.png" class="img-fluid shadowtriangle" alt="Image">
 				<div class="contest_content">
 					<h2 class="text-light mr-5 pr-5">Our Running Contests</h2>
 					<button class="primary_button mt-3" onclick="{window.location.href='contest-list.php'}">Ongoing</button>
 				</div>
                 <?php
                   if(isset($on_contest))
                   {
                       foreach($on_contest as $data)
                       {
                           
                           $date1 = $contest['start_date']." ".$contest['start_time'].":00";
                           $date2 = $contest['end_date']." ".$contest['end_time'].":00"; 
                           $diff = abs(strtotime($date2) - strtotime($date1));
                           $id = $data['id'];
                ?>
 				<div class="contest_right text-center">
                    <h3><a href="contest.php?token=<?=$data['id']?>" target="_top"><?=$data['name']?></a></h3>
                    <p><?=$data['description']?></p>
 					<button class="primary_button" onclick="{window.location.href='contest<?=$id?>'}">View</button><br/>
                        <?php
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
                    <button class="primary_button mt-3" onclick="{window.location.href='<?=$link?>'}"><?=$title?></button>
 				</div>

 				<div class="contest_bottom">
 					<img src="assets/image/headphone.png" class="contest-img" alt="Image">
 					<img src="assets/image/person_front.png" class="contest-img" alt="Image">
 					<img src="assets/image/rocking_hand.png" class="contest-img"  alt="Image">
 					<!-- <img src="assets/image/person_looking_right.png" class="contest-img" alt="Image"> -->
 					<img src="assets/image/mic.png" class="contest-img" alt="Image">
 				</div>
                 <?php
                       }
                    }
                 ?>
 			</div>


 		</section>
 	<!-- our running end -->




 		<!-- blog section end -->


 <?php 
 		require_once "javascript.php";
  ?>
  