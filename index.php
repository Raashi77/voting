	<?php 

		require_once "header_new.php";
		require_once "navbar_new.php";
		
	?>



	<section class='banner py-5'>

		<div class="container">
			<div class="row">
				<div class="col-lg-6  col-md-6 col-sx-10 offset-lg-3 offset-md-3 offset-sx-1">
					<img src="admin/<?=$slider['image']?>" class="img-fluid" alt="Image">
				</div>
			</div>
		</div>
		
	</section>





				<!-- video gallery -->
				<section class="" id="videosPlace" >
					<iframe src="indexVideo.php" width="100%" height="700px" style="border:0;overflow-y:hidden">
					
					</iframe>
					<iframe src="indexSongs.php" width="100%" height="750px" style="border:0;overflow-y:hidden">
					
					</iframe>
					<iframe src="indexContest.php" width="100%" height="700px" style="border:0;overflow-y:hidden">
					
					</iframe>
						
				</section>
					<!-- video gallery end -->

					<!-- video controller -->
					
					<!-- video controller end -->




					<!-- audio gallery -->
					


			


	<!-- http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4 -->



		<!-- our running contest -->
			



		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 mb-4 text-center bg-light">
						<img src="admin/<?=$web_config['feature_image']?>" class="img-fluid" alt="Image">
					</div>
					<div class="col-lg-6 col-md-6 text-light justify-content-center align-self-center" id="features">
						

							<!-- <div class="pl-5 d-flex">
								<div>
									<i class="fas fa-music m-3" style="font-size: 38px;"></i>
								</div>
								<div class="ml-3">
									<h3>Song</h3>
									<p>
										Simply dummy text of the printing andrety esetting industry.
										Lorem Ipsum has beeyan the indust standard
									</p>
								</div>
							</div> -->


							<!-- <div class="pl-5 mt-5 d-flex">
								<div>
									<i class="fas fa-video m-3" style="font-size: 38px;"></i>
								</div>
								<div class="ml-3">
									<h3>Make Video</h3>
									<p>
										Simply dummy text of the printing andrety esetting industry.
										Lorem Ipsum has beeyan the indust standard
									</p>
								</div>
							</div>


							<div class="pl-5 mt-5 d-flex">
								<div>
									<i class="fas fa-download m-3" style="font-size: 38px;"></i>
								</div>
								<div class="ml-3">
									<h3>Video Download</h3>
									<p>
										Simply dummy text of the printing andrety esetting industry.
										Lorem Ipsum has beeyan the indust standard
									</p>
								</div>
							</div> -->


					</div>
				</div>
			</div>
		</section>





			<!-- blog section -->
			<section class="blog_post">

				<div class="container mt-5">
					<div class="text-center text-light mb-5">
						<h1>Blog Posts</h1>
					</div>
					<div class="row" id="showBlogs">
						<!-- <div class="col-lg-4 mt-4">
							<div class="p-2">
								<div class="card">
								<img class="card-img-top" src="assets/image/blog_spot_poster.png" alt="Card image cap">
								<div class="card-body pb-0">
									<h3 class="card-title">Heading</h3>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
								</div>
								<div class="text-right pr-2" style="font-size:34px;">
									<i class="fas fa-chevron-circle-right"></i>
								</div>
							</div>
						</div>

						
						<div class="col-lg-4 mt-4">
							<div class="p-2">
								<div class="card">
								<img class="card-img-top" src="assets/image/blog_spot_poster.png" alt="Card image cap">
								<div class="card-body pb-0">
									<h3 class="card-title">Heading</h3>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
								</div>
								<div class="text-right pr-2" style="font-size:34px;">
									<i class="fas fa-chevron-circle-right"></i>
								</div>
							</div>
						</div>


						<div class="col-lg-4 mt-4">
							<div class="p-2">
								<div class="card">
								<img class="card-img-top" src="assets/image/blog_spot_poster.png" alt="Card image cap">
								<div class="card-body pb-0">
									<h3 class="card-title">Heading</h3>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
								</div>
								<div class="text-right pr-2" style="font-size:34px;">
									<i class="fas fa-chevron-circle-right"></i>
								</div>
							</div>
						</div> -->

						

					</div><!-- row end -->
				</div>

			</section>
			<!-- blog section end -->


	<?php 
			require_once "footer_new.php";
			require_once "javascript.php";
	?>
	<div id="javaScript"></div>
	<script>
		$(document).ready(function (event) {
			//alert("hi there");
			$.get('index_ajax.php?fetch=true', function(response) {
				console.log(response); 
				$("#showBlogs").html(response.blog);
				$("#features").html(response.features);
				// $("#videosPlace").html(response.video);
				$("#javaScript").html(response.script);
				// console.log("sd");
			}, "JSON");
		});
	</script>