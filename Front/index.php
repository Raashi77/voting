<?php 

	require_once "header_new.php";
	require_once "navbar_new.php";

 ?>



 <section class='banner py-5'>

 	<div class="container">
 		<div class="row">
 			<div class="col-lg-6  col-md-6 col-sx-10 offset-lg-3 offset-md-3 offset-sx-1">
 				<img src="assets/image/banner.jpg" class="img-fluid" alt="Image">
 			</div>
 		</div>
 	</div>
 	
 </section>





 			<!-- video gallery -->
 		    <section class="wrapperforvideo">
 		            <div class="box1">
 		            	<div class="videoslick">
 		            		<div class="">
 		            			<video  class="" controls>
 		            			         <source src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type = "video/mp4">
 		            			         This browser doesn't support video tag.
 		            			 </video>
 		            		</div>


 		            		<div class="">
 		            			<video  class="embed-responsive-item" controls>
 		            			         <source src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type = "video/mp4">
 		            			         This browser doesn't support video tag.
 		            			 </video>
 		            		</div>


 		            		<div class="">
 		            			<video  class="" controls>
 		            			         <source src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type = "video/mp4">
 		            			         This browser doesn't support video tag.
 		            			 </video>
 		            		</div>

 		            		

 		            		
 		            	</div>
 		            </div>
 		            <div class="box1 box2">
 		            	<img src="assets/image/shadowtriangle.png" height="650px;" width="110%" alt="Image">
 		            </div>
 		            <div class="box1 box3">
 		            	<h2 class="text-light">Video Gallery</h2>
 		            	<button class="primary_button mt-3">View All</button>
 		            </div>

 		            <div class="box1 box3 text-center">
 		            	<img src="assets/image/play_button.png" style="margin-top: 260px;" width="120" alt="Image">
 		            </div>
 		        </section>
 		        <!-- video gallery end -->

 		        <!-- video controller -->
 		        <div style="position: relative">
 		        	<div class="container-fluid" style="position:  absolute; bottom: 0; background-color: #1b191e">
 		        		<div class="container videocontrollers">
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
 		        <!-- video controller end -->




 		        <!-- audio gallery -->
 		       <section class="wrapperforaudio">
 		               <div class="box1">
 		               	<div class="row audioslick mb-4">

 		               		
 		               	
 		               	<div class="col-lg-4">
 		               		<div class="p-4">

 		               			<div class="card" style="background-color: #1c1d31; color: white;">
 		               			  <img class="card-img-top p-4 pt-5" src="assets/image/video_fram.png" alt="Card image cap" style="min-height: 450px;">
 		               			  <div class="card-body">
 		               			    <!-- <h5 class="card-title">Card title</h5> -->
 		               			    
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
 		               	<!-- lg-4 end -->



 		               	<div class="col-lg-4">
 		               		<div class="p-4">

 		               			<div class="card" style="background-color: #1c1d31; min-height: 600px; color: white;">
 		               			  <img class="card-img-top p-4 pt-5" src="assets/image/video_fram.png" alt="Card image cap" style="min-height: 450px;">
 		               			  <div class="card-body">
 		               			    <!-- <h5 class="card-title">Card title</h5> -->
 		               			    
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
 		               	<!-- lg-4 end -->



 		               	<div class="col-lg-4">
 		               		<div class="p-4">

 		               			<div class="card" style="background-color: #1c1d31; min-height: 600px; color: white;">
 		               			  <img class="card-img-top p-4 pt-5" src="assets/image/video_fram.png" alt="Card image cap" style="min-height: 450px;">
 		               			  <div class="card-body">
 		               			    <!-- <h5 class="card-title">Card title</h5> -->
 		               			    
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
 		               			   	<input id="dur" class="form-control" type="range" name="rng" min="0" step="0.25" value="0" onchange="mSet()" max="1081.286">
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
 		               	<!-- lg-4 end -->

 		               	<div class="col-lg-4">
 		               		<div class="p-4">

 		               			<div class="card" style="background-color: #1c1d31; min-height: 600px; color: white;">
 		               			  <img class="card-img-top p-4 pt-5" src="assets/image/video_fram.png" alt="Card image cap" style="min-height: 450px;">
 		               			  <div class="card-body">
 		               			    <!-- <h5 class="card-title">Card title</h5> -->
 		               			    
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
 		               			   	<input id="dur" class="form-control" type="range" name="rng" min="0" step="0.25" value="0" onchange="mSet()" max="1081.286">
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
 		               	<!-- lg-4 end -->

 		               		

 		               		
 		               	</div>
 		               </div>
 		               <div class="box1 box2">
 		               	<img src="assets/image/shadowtriangle.png" class="img-fluid" alt="Image">
 		               </div>

 		               <div class="box1 box3">
 		               	<h2 class="text-light">Song Gallery</h2>
 		               	<button class="primary_button mt-3">Play All</button>
 		               </div>

 		               
 		           </section>
 		           <!-- audio gallery end -->



 		         <!-- audio controller -->
 		        <div style="position: relative; padding-bottom: 50px;">
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
 		        <!-- audio controler end -->


 		


<!-- http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4 -->



 	<!-- our running contest -->
 		<section class="running_contest">

 		
 			<div class="wallimg">
 				<img src="assets/image/shadowtriangle.png" class="img-fluid shadowtriangle" alt="Image">
 				<div class="contest_content">
 					<h2 class="text-light mr-5 pr-5">Our Running Contests</h2>
 					<button class="primary_button mt-3">Ongoing</button>
 				</div>
 				<div class="contest_right text-center">
 					<button class="primary_button">View</button><br/>
 					<button class="primary_button mt-3">Join For Free</button>
 				</div>

 				<div class="contest_bottom">
 					<img src="assets/image/headphone.png" class="contest-img" alt="Image">
 					<img src="assets/image/person_front.png" class="contest-img" alt="Image">
 					<img src="assets/image/rocking_hand.png" class="contest-img"  alt="Image">
 					<img src="assets/image/person_looking_right.png" class="contest-img" alt="Image">
 					<img src="assets/image/mic.png" class="contest-img" alt="Image">
 				</div>
 			</div>


 		</section>
 	<!-- our running end -->




 	<section>
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-6 col-md-6 mb-4 text-center bg-light">
 					<img src="assets/image/tumblr_n8nofbqR3l1spn9cyo1_1280.jpeg" class="img-fluid" alt="Image">
 				</div>
 				<div class="col-lg-6 col-md-6 text-light justify-content-center align-self-center">
 					

			 			<div class="pl-5 d-flex">
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
						</div>


						<div class="pl-5 mt-5 d-flex">
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
						</div>


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
 				<div class="row">
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

 					

 				</div><!-- row end -->
 			</div>

 		</section>
 		<!-- blog section end -->











 <?php 
 		require_once "javascript.php";
 		require_once "footer_new.php";
  ?>