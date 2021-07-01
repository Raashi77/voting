<?php 

	require_once 'lib/core.php';	

	$sql="select * from songs order by id desc limit 6";
        $videos = "";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row = $result->fetch_assoc())
                {
					$songs[] = $row;
                }
            }
            
        }    
        else
        {
            echo $conn->error;
        }
		// print_r($songs);
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

		 		<section class="wrapperforaudio" >
 		               <div class="box1">
 		               	<div class="row audioslick mb-4">

 		               		
 		               	<?php
                            if(isset($songs))
                            {
                                foreach($songs as $song)
                                {
                                 
                        ?>
 		               	<div class="col-lg-4">
 		               		<div class="p-4">

 		               			<div class="card" style="background-color: #1c1d31; color: white;" >
                                    <script type="text/javascript">
                                        setTime(<?=$song['id']?>,'<?=$song['song']?>');
                                        function setTime(id,aud)
                                        {
                                            var audd = new Audio('admin'+aud);
                                            audd.preload="predata";
                                            audd.onloadedmetadata = function() {
                                                
                                                var time = Math.round(audd.duration);
                                                console.log(time)
                                                var minutes = Math.floor(time / 60);
                                                var seconds = time - minutes * 60;
												if(seconds < 10)
												{
													seconds = "0"+ seconds
												}
                                                $("#time"+id).html(minutes+":"+seconds);
                                            };
                                        }
                                    </script>
 		               			  <img class="card-img-top p-4 pt-5" src="images/unnamed.png" alt="Card image cap" >
 		               			  <div class="card-body">
 		               			    <center><h5 class="card-title"><?=$song['name']?></h5></center>
 		               			    
 		               			    <div class="row">
 		               			    	<div class="col-6">
 		               			    		<i class="fas fa-plus"></i>
 		               			    		<p id="currentTime<?=$song['id']?>" class="presentTime">0:00</p>
 		               			    	</div>
 		               			    	<div class="col-6 text-right">
 		               			    		<i class="fas fa-ellipsis-h"></i>
 		               			    		<p id="time<?=$song['id']?>" class="totalTime">0:00</p>
 		               			    	</div>
 		               			    </div>
                                        
                                      <div class="text-center">
                                      <!-- /*onchange="mChange(<?=$song['id']?>)"*/ -->
 		               			   	    <input id="dura<?=$song['id']?>" class="form-control duraBar" type="range" name="rng" min="0" step="0" value="0"   max="100" disabled>
 		               			   </div>



 		               			   <div class="mt-3 row text-center justify-content-center align-self-center">
 		               			   	<!-- <div class="col-2">
 		               			   		<i class="fas fa-random fontsize28"></i>
 		               			   	</div>
 		               			   	<div class="col-2">
 		               			   		<i class="fas fa-step-backward fontsize28"></i>
 		               			   	</div> -->
 		               			   	<!-- <div class="col-4 play_button"  style="cursor:pointer" id="playButton<?=$song['id']?>"; onclick="playAudio('<?=$song['song']?>',<?=$song['id']?>)">
 		               			   		<img src="assets/image/play_button.png" class="fontsize65" alt="Image">
 		               			   	</div>
                                    <div class="col-4 pause_button" style="cursor:pointer;display:none;" id="pauseButton<?=$song['id']?>" onclick="pauseAudio(<?=$song['id']?>)">
                                        <i class="far fa-pause-circle " style="color:white;font-size:65px"></i>
 		               			   	</div> -->
									<center>
										<i class="far fa-play-circle play_button" style="color:white;font-size:55px;cursor:pointer" id="playButton<?=$song['id']?>"; onclick="playAudio('<?=$song['song']?>',<?=$song['id']?>)"></i>
										<i class="far fa-pause-circle pause_button" style="color:white;font-size:55px;cursor:pointer;display:none" id="pauseButton<?=$song['id']?>" onclick="pauseAudio(<?=$song['id']?>)"></i>	
									</center>
 		               			   	<!-- <div class="col-2">
 		               			   		<i class="fas fa-step-forward fontsize28"></i>
 		               			   	</div>
 		               			   	<div class="col-2">
 		               			   		<i class="fas fa-sync-alt fontsize28"></i>
 		               			   	</div> -->
 		               			   </div>



 		               			  </div>
 		               			</div>

 		               		</div>
 		               	</div>
 		               	<!-- lg-4 end -->
                        <?php
                               
                            }
                        }    
                        
                        ?>

<!-- 
 		               	<div class="col-lg-4">
 		               		<div class="p-4">

 		               			<div class="card" style="background-color: #1c1d31; min-height: 600px; color: white;">
 		               			  <img class="card-img-top p-4 pt-5" src="assets/image/video_fram.png" alt="Card image cap" style="min-height: 450px;">
 		               			  <div class="card-body">
 		               			     <h5 class="card-title">Card title</h5> 
 		               			    
 		               			    <div class="row">
 		               			    	<div class="col-6">
 		               			    		<i class="fas fa-plus"></i>
 		               			    		<p>1:60</p>
 		               			    	</div>
 		               			    	<div class="col-6 text-right">
 		               			    		<i class="fas fa-ellipsis-h"></i>
 		               			    		<p>-1:21</p>
 		               			    	</div>
 		               			    </div>

 		               			   <div class="text-center">
 		               			   	<input id="dur" class="form-control" type="range" name="rng" min="0" step="0.25" value="0" onchange="mSet()"  max="1081.286">
 		               			   </div>



 		               			   <div class="mt-3 row text-center justify-content-center align-self-center">
 		               			   	<div class="col-2">
 		               			   		<i class="fas fa-random fontsize28"></i>
 		               			   	</div>
 		               			   	<div class="col-2">
 		               			   		<i class="fas fa-step-backward fontsize28"></i>
 		               			   	</div>
 		               			   	<div class="col-4">
 		               			   		<img src="assets/image/play_button.png" class="fontsize65" alt="Image">
 		               			   	</div>
 		               			   	<div class="col-2">
 		               			   		<i class="fas fa-step-forward fontsize28"></i>
 		               			   	</div>
 		               			   	<div class="col-2">
 		               			   		<i class="fas fa-sync-alt fontsize28"></i>
 		               			   	</div>
 		               			   </div>



 		               			  </div>
 		               			</div> 

 		               		</div>
 		               	</div>
 		               	-->



 		               	<!-- lg-4 end -->

 		               		

 		               		
 		               	</div>
 		               </div>
 		               <div class="box1 box2">
 		               	<img src="assets/image/shadowtriangle.png" class="img-fluid" alt="Image">
 		               </div>

 		               <div class="box1 box3">
 		               	<h2 class="text-light">Song Gallery</h2>
 		               	<a href="allsongs" target="_top" class="primary_button mt-3" style="text-decoration:none!important">All Songs</a>&nbsp;
						<?php
							if(isset($_SESSION['signed_in']))
							{
								?>
                                    <br><br>
									<a href="yoursongs" target="_top" class="primary_button mt-3" style="text-decoration:none!important">Your Songs</a>
								<?php
							}
						?>
 		               </div>

 		               
				</section>
 		           <!-- audio gallery end -->



 		         <!-- audio controller -->
 		        <div >
 		        	<div class="container-fluid controls" style="position:  absolute; background-color: #1b191e">
 		        		<div class="container audiocontroller">
 		        			<div class="row text-center text-light">
 		        				<div class="col-4 pt-2" style="cursor:pointer">
 		        					<i class="fas fa-chevron-left" style="font-size: 34px;"></i>
 		        				</div>
 		        				<div class="col-4">
 		        					<p style="font-size: 34px; font-weight: bolder;">|</p>
 		        				</div>
 		        				<div class="col-4 pt-2" style="cursor:pointer">
 		        						<i class="fas fa-chevron-right" style="font-size: 34px;"></i>
 		        				</div>
 		        			</div>
 		        		</div>
 		        	</div>
 		        </div>
 		        <!-- audio controler end -->


 <?php
	require_once 'javascript.php';
 ?>

</body>

</html>
<script>
    
    
    var audio = new Audio('admin/uploads/Yeh baby.mp3');
    function pauseAudio(id)
    {
        audio.pause();
        $(".play_button").show();
        $(".pause_button").hide();
		
    }
    function mChange(id)
    {
        audio.pause();
        var current = $("#dura"+id).val();
        audio.currentTime = current/2;
        audio.play();

    }
    function playAudio(path,id)
    {
        audio.pause();
		$(".duraBar").val(0);
		// $(".presentTime").html("0:00");
		// $(".totalTime").html("0:00");
        audio = new Audio('admin'+path);
        audio.id = "mySong"+id;
        audio.preload = "metdata";
        // audio.currentTime=0;
        $("body").append(audio);
        $("#mySong"+id).hide();
        var audioTime = $("#mySong"+id)
        audio.play();
        // console.log(audio,audioTime[0].duration,audioTime);
        $(".play_button").show();
        $(".pause_button").hide();
        $("#playButton"+id).hide();
        $("#pauseButton"+id).show();
        // audio.currentTime=0;
        // mChange(id);
		audio.preload="predata";
		audio.onloadedmetadata = function() {
			
			var time = Math.round(audio.duration);
			// console.log(time)
			var minutes = Math.floor(time / 60);
			var seconds = time - minutes * 60;
			if(seconds < 10)
			{
				seconds = "0"+ seconds
			}
			$("#time"+id).html(minutes+":"+seconds);
		};
        audio.addEventListener("timeupdate", function () {
		var position = (100 / audio.duration) * audio.currentTime;
		var current = audio.currentTime;
		var duration = audio.duration;
		var durationMinute = Math.floor(duration / 60);
		var durationSecond = Math.floor(duration - durationMinute * 60);
		var durationLabel = durationMinute + ":" + durationSecond;
		currentSecond = Math.floor(current);
		currentMinute = Math.floor(currentSecond / 60);
		currentSecond = currentSecond - currentMinute * 60;
		// currentSecond = (String(currentSecond).lenght > 1) ? currentSecond : ( String("0") + currentSecond );
		if (currentSecond < 10) {
			currentSecond = "0" + currentSecond;
		}
		var currentLabel = currentMinute + ":" + currentSecond;
		var indicatorLabel = currentLabel ;
        // $("#time"+id).html(durationLabel)
		$("#dura"+id).attr("value", position-2 );
        // console.log(indicatorLabel);
		$("#currentTime"+id).html(indicatorLabel);
        audio.addEventListener('ended',function(){
			$(".play_button").show();
			$(".pause_button").hide();

		});
		// audio.addEventListener("pause", function () 
		// {
		// 	var currentLabel = currentMinute + ":" + currentSecond;
		// 	var indicatorLabel = currentLabel ;
		// 	$("#currentTime"+id).html(indicatorLabel);
		// })
	});


    }
    
</script>