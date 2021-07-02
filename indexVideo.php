	<?php 

		require_once 'lib/core.php';	

		$sql="select * from videos order by time_stamp desc limit 6";
			$videos = "";
			if($result =  $conn->query($sql))
			{
				if($result->num_rows)
				{
					while($row = $result->fetch_assoc())
					{
						$vidSrc = $row['video'];
						$videos .="<div class=''>
										<video  class='' controls>
												<source src = '$vidSrc#t=0.1' type = 'video/mp4'>
												This browser doesn't support video tag.
										</video>
									</div>";
						$vidSlider[] = $row;
					}
				}
			
			}    
			else
			{
				echo $conn->error;
			}
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
		
		<style>#totop{display:none !important}</style>
	</head>





	<body style="overflow-y:hidden;overflow-x:hidden !important">




				<!-- video gallery -->
				<section class="wrapperforvideo" id="videosPlace">
					<div class="box1">
						<div class="row audioslick mb-4">

							<?php
								if(isset($vidSlider))
								{
									foreach($vidSlider as $vid)
									{
							?>
								<div class="col-lg-4">
								<div class="p-4">

									<div class="card" style="background-color: #1c1d31; min-height: 500px; color: white;">
									<video  class=""  id="video<?=$vid['id']?>" style="max-height:58vh !important" playsinline controls="true">
											<source src = "<?=$vid['video']?>#t=0.1" type = "video/mp4">
											This browser doesn't support video tag.
									</video>
									<script type="text/javascript">
                                        setTime(<?=$vid['id']?>,'<?=$vid['video']?>');
                                        function setTime(id,aud)
                                        {
                                            var audd = document.getElementById("video"+id);
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
                                                document.getElementById("time"+id).innerHTML=(minutes+":"+seconds);
                                            };
                                        }
                                    </script>
									<div class="card-body">
										<div class="row">
											<div class="col-3">
												<i class="fas fa-plus"></i>
												<p id="currentTime<?=$vid['id']?>">0:00</p>
											</div>
											<div class="col-6">
												<center>
													<i class="far fa-play-circle play_button" style="color:white;font-size:55px;cursor:pointer" id="playButton<?=$vid['id']?>"; onclick="playVideo('<?=$vid['video']?>',<?=$vid['id']?>)"></i>
													<i class="far fa-pause-circle pause_button" style="color:white;font-size:55px;cursor:pointer;display:none" id="pauseButton<?=$vid['id']?>" onclick="pauseVideo(<?=$vid['id']?>)"></i>	
												</center>
											</div>
											<div class="col-3 text-right">
												<i class="fas fa-ellipsis-h"></i>
												<p id="time<?=$vid['id']?>">0:00</p>
											</div>
										</div>

									<div class="text-center">
										<input id="dura<?=$vid['id']?>" disabled class="form-control" type="range" name="rng" min="0" step="0.25" value="0"   max="100">
									</div>



									<div class="mt-3 row text-center justify-content-center align-self-center">
										<!-- <div class="col-2">
											<i class="fas fa-random fontsize28"></i>
										</div>
										<div class="col-2">
											<i class="fas fa-step-backward fontsize28"></i>
										</div> -->
										<div class="col-4">
											<!-- <img src="assets/image/play_button.png" class="fontsize" alt="Image"> -->
										</div>
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

							<?php
									}
								}
							?>
							
							</div>
						</div>
						<div class='box1 box2'>
							<img src='assets/image/shadowtriangle.png' height='100%' width='110%' alt='Image'>
						</div>
						<div class='box1 box3'>
							<h2 class='text-light'>Video Gallery</h2>
							<a href="videoGallery" target="_top" class='primary_button mt-3' style="text-decoration:none !important">View All</a>
						</div>

						<div class='box1 box3 text-center'>
							<!-- <img src='assets/image/play_button.png' style='margin-top: 260px;' width='120' alt='Image'>  -->
						</div>
				</section>
				<div style="position: relative">
						<div class="container-fluid" style="position:  absolute; bottom: 0; background-color: #1b191e">
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
			<!-- blog section end -->
					
					<!-- audio controler end -->


	<?php
		require_once 'javascript.php';
	?>

	</body>

	</html>
	
<script>
    
    
    var video = null;
    function pauseVideo(id)
    {
        video[0].pause();
        $(".play_button").show();
        $(".pause_button").hide();
    }
    function mChange(id)
    {
        video[0].pause();
        var current = $("#dura"+id).val();
        video.currentTime = current/2;
        video.play();

    }
    function playVideo(path,id)
    {
        if(video != null)
		{
			video[0].pause();
		}
        video = $("#video"+id);
        video.preload = "metadata";
		// console.log(video);
        video[0].play();
        // console.log(video,videoTime[0].duration,videoTime);
        $(".play_button").show();
        $(".pause_button").hide();
        $("#playButton"+id).hide();
        $("#pauseButton"+id).show();
        // video.currentTime=0;
        // mChange(id);
		video[0].preload="predata";
		video[0].onloadedmetadata = function() {
			
			var time = Math.round(video[0].duration);
			// console.log(time)
			var minutes = Math.floor(time / 60);
			var seconds = time - minutes * 60;
			if(seconds < 10)
			{
				seconds = "0"+ seconds
			}
			$("#time"+id).html(minutes+":"+seconds);
		};
        video[0].addEventListener("timeupdate", function () {
		var position = (100 / video[0].duration) * video[0].currentTime;
		var current = video[0].currentTime;
		var duration = video[0].duration;
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
		video[0].addEventListener('ended',function(){
			$(".play_button").show();
			$(".pause_button").hide();

		});
	});


    }
    
</script>
