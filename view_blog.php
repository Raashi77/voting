<?php
 require_once 'header.php';
 require_once 'navbar.php';  
if(isset($_GET['token'])&&!empty($_GET['token']))
{
	$token=$_GET['token'];
	$sql="select b.*, bc.category as bc_category,bc.color, m.name as writer from blogs b, blog_categories bc, master_admin m where b.id='$token' and b.category=bc.id and b.status=1";
	if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
        	$row = $result->fetch_assoc();
			$blog = $row;
        } 
    }
	$sql = "select tags from blogs where id='$token' and status=1";
    $result = $conn->query($sql);
    if($result->num_rows)
    {
        
        while($row = $result->fetch_assoc())
        {
            $alltags[] = explode(",",$row['tags']); 
        }
    }
}
	$sql = "select * from blogs as b where   b.status=1 order by b.timestamp limit 3";
     $result = $conn->query($sql);
     if($result->num_rows)
     {
         while($row = $result->fetch_assoc())
         {
               $popBlog[] = $row;
         } 
     }
	$sql = "select * from blogs b where b.category=(select category from blogs where id='$token') and status = 1 limit 4";
     $result = $conn->query($sql);
     if($result->num_rows)
     {
         while($row = $result->fetch_assoc())
         {
               $category_blogs[] = $row;
         } 
     }

	 $sql="select * from web_config where id=1";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                 $web_config = $row;
        }
    }

?> 
	<link href="./css/blog_new.css" rel="stylesheet" type="text/css" />
	<script src="./js/webfont/webfont.js" type="text/javascript"></script>
	<script type="text/javascript">
		WebFont.load({
			google: {
				families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic", "Noto Sans HK:regular,500,700"]
			}
		});
	</script>
	<script type="text/javascript">
		! function(o, c) {
			var n = c.documentElement,
				t = " w-mod-";
			n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
		}(window, document);
	</script> 
	<style>
		h2, h5{
			color: <?=$headingTextColorFirst?>;
		}
		p{
			color: <?=$otherTextColor?>;
		}
		body{
			color: <?=$otherTextColor?>
		}
	</style>
 
	<div class="page-wrapper">
		<!-- <div class="subscribe-popup">
			<div class="popup"><a data-w-id="815c6cd4-8036-9e9d-af11-10e598a3accc" href="#" class="close-button w-inline-block"><img src="images/5d06166e6a93604d0a953a2e_x.svg" alt="" /></a>
				<div class="subscribe-popup-image"></div>
				<div class="popup-info">
					<h3>📬 <br />Sign Up for Our Amazing Newsletter!</h3>
					<p class="paragraph-small text-grey">Writing result-oriented ad copy is difficult, as it must appeal to, entice, and convince consumers to take action.</p>
					<div class="full-width w-form">
						<form id="wf-form-Footer-Form" name="wf-form-Footer-Form" data-name="Footer Form" class="subscribe-popup-grid"><input type="email" class="input w-input" maxlength="256" name="Footer-Subscribe-2" data-name="Footer Subscribe 2" placeholder="Email address" id="Footer-Subscribe-2" required="" /><input type="button" value="Subscribe" class="button w-button" id="button_subscribe" />
							<div id="w-node-_3a6d75b8-c251-940d-8ed9-73c31209ac7d-98a3acca" class="form-info">No spam ever. Read our <a href="https://reader-template.webflow.io/privacy-policy" class="text-link-dark">Privacy Policy</a></div>
						</form>
						<div class="		form-success w-form-done">
							<div>Thank you! Your submission has been received!</div>
						</div>
						<div class="form-error w-form-fail">
							<div>Oops! Something went wrong while submitting the form.</div>
						</div>
					</div>
				</div>
			</div>
			<div data-w-id="8320a785-99cd-bbdc-fd84-db16e1cc82eb" class="popup-overlay"></div>
		</div> -->
		<div data-collapse="medium" data-animation="default" data-duration="400" id="Navigation" data-w-id="68906341-c776-5606-916e-b44fde4e642a" role="banner" class="nav-bar-v1 w-nav">
			<div class="wrapper nav-bar-v1-wrapper"><a href="#" class="nav-brand-v1 w-nav-brand"><img src="admin/<?=$web_config['logo']?>" alt="" class="nav-logo" />
					<!-- <div class="nav-logo-text">DU Buddy</div> -->
				</a>
				<nav role="navigation" class="nav-menu-v1 w-nav-menu">
					<div data-hover="1" data-delay="400" class="dropdown w-dropdown">
						<div class="nav-link w-dropdown-toggle">
							<div><a href="index">Home</a></div>
						</div>
					</div>
				</nav>
				<div class="menu-button w-nav-button">
					<div class="menu-icon">
						<div class="menu-line-top"></div>
						<div class="menu-line-middle"></div>
						<div class="menu-line-bottom"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="Hero" style="background-image:url(<?=$blog['image']?>)" class="section post-hero-section">
			<div class="wrapper">
				<div class="post-hero-content"><a style="background-color:<?=$blog['color']?>" href="blog_categories?cat=<?=$blog['bc_category']?>" class="badge"><?=$blog['bc_category']?></a>
					<h1 class="post-heading"><?=$blog['title']?></h1>
					<div class="post-info text-white"><a href="#" class="post-info-author text-white w-inline-block"><i class="fa fa-user"></i>
							<div><?=$blog['writer']?></div>
							<div class="divider-small transparent"></div>
						</a>
						<div class="post-info-block"><i class="fa fa-calendar"></i>
							<div><?php $date=date_create($blog['timestamp']);
                                                echo date_format($date,"M d Y"); ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="post-hero-gradient"></div>
		</div>
		<div class="section">
			<div class="wrapper w-container">
				<div class="post-wrapper">
					<div class="post-content">
						<div class="post-body">
							<!-- <div class="post-share"><a href="https://webflow.com/blog/customizing-your-social-sharing-buttons-with-webflow-cms" target="_blank" class="social-icon twitter w-inline-block"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89160947bf36aa_twitter-white.svg" alt="" /></a><a href="https://webflow.com/blog/customizing-your-social-sharing-buttons-with-webflow-cms" target="_blank" class="social-icon facebook w-inline-block"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89164b7ebf36a1_facebook-white.svg" alt="" /></a><a href="https://webflow.com/blog/customizing-your-social-sharing-buttons-with-webflow-cms" target="_blank" class="social-icon pinterest w-inline-block"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d0616bf85f49b338aa62778_pinterest-white.svg" alt="" /></a><a href="https://webflow.com/blog/customizing-your-social-sharing-buttons-with-webflow-cms" target="_blank" class="social-icon w-inline-block"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d0616bd5b8916631fc17bcd_mail-white.svg" alt="" /></a></div> -->
							<div class="post w-clearfix">
								<div class="post-rich-text w-richtext">
								<?php echo html_entity_decode($blog['long_description']); ?>
								</div>
								<div class="post-bottom-info" style="color: <?=$otherTextColor?>" >
									<div>Posted </div>
									<div><?php $date=date_create($blog['timestamp']);
                                                echo date_format($date,"M d Y"); ?></div>
									<div> in </div><a style="color: <?=$headingTextColorFirst?>" href="blog_categories?cat=<?=$blog['bc_category']?>" class="post-bottom-category"><?=$blog['bc_category']?></a>
									<div> category</div>
								</div>
								<div class="post-about">
									<div class="post-author">
										<!-- <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d09f1e7887607482e5d6154_team-member-5-avatar.html)" class="post-avatar"></div> -->
										<h4><?=ucfirst($blog['writer'])?></h4>
									</div>
									<div class="post-tags">
										<h6>Post Tags:</h6>
										<div class="w-dyn-list">
											<div role="list" class="post-tags-list w-dyn-items">
												<?php
												foreach($alltags as $taglist)
												{
													foreach($taglist as $list)
													{
												?>
														<div role="listitem" class="w-dyn-item"><a href="blog_categories?tag=<?=$list?>" class="tag"><?=html_entity_decode($list)?></a></div>
														<?php
													}
												}
											?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="post-more">
							<div class="header-block side-margins">
								<div class="header">
									<h4 class="header-text">More from </h4>
									<h4 class="header-text"><?=$blog['bc_category']?></h4>
									<h4 class="header-text"> category</h4>
								</div>
								<div class="header-line"></div>
							</div>
							<div class="w-dyn-list">
								<div role="list" class="grid-mini w-dyn-items">
									<?php
									foreach($category_blogs as $data)
									{
									?>
										<div role="listitem" class="w-dyn-item">
											<div class="post-mini"><a href="view_blog?token=<?=$data['id']?>" class="post-mini-thumbnail w-inline-block">
													<div style="background-image:url(<?=$data['image']?>)" class="thumbnail"></div>
												</a>
												<div class="post-mini-content"><a href="view_blog?token=<?=$data['id']?>" class="post-heading-link w-inline-block">
														<h5 class="post-mini-heading"><?=$data['title']?></h5>
													</a>
												</div>
											</div>
										</div>
									<?php
									}
									?>
									
								</div>
							</div>
						</div>
						 
					</div>
					<div class="sidebar">
						<div class="sidebar-block">
							<div class="header-block">
								<h4 class="header">Featured</h4>
								<div class="header-line"></div>
							</div>
							<div class="w-dyn-list">
								<div role="list" class="grid-mini-list w-dyn-items">
							<?php
								foreach($popBlog as $pop)
								{
							?>
										<div role="listitem" class="w-dyn-item">
											<div class="post-mini"><a href="view_blog?token=<?=$pop['id']?>" aria-current="page" class="post-mini-thumbnail w-inline-block w--current">
													<div style="background-image:url(<?=$pop['image']?>)" class="thumbnail"></div>
												</a>
												<div class="post-mini-content"><a href="view_blog?token=<?=$pop['id']?>">
														<h6 class="post-mini-heading"><?=$pop['title']?></h6>
													</a>
												</div>
											</div>
										</div>
							<?php
								}
							?>	
								</div>
							</div>
						</div>
						<div class="sidebar-block">
							<div class="header-block">
								<h4 class="header">Tags</h4>
								<div class="header-line"></div>
							</div>
							<div class="w-dyn-list">
								<div role="list" class="sidebar-tags w-dyn-items">
									<?php
										foreach($alltags as $taglist)
										{
											foreach($taglist as $list)
											{
										?>
												<div role="listitem" class="w-dyn-item"><a href="blog_categories?tag=<?=$list?>" class="tag"><?=html_entity_decode($list)?></a></div>
												<?php
											}
										}
									?>
								</div>
							</div>
						</div>
						 
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		require_once "js-links.php";
	?>
	<!-- <script src="./js/blog_new.js" type="text/javascript"></script> -->
</body>
</html>

<script>
 
	
	function subscribe1(email,success,error,form)
	{
		  
		$.ajax({
        url:"subscribe.php",
        type:"POST",
        data:{
            subscribe1: email,
            email: email
        },
        success:function(data)
        { 
				if(data.trim()=="ok")
				{ 

					$("#"+success).html("Thank you! Your submission has been received!").fadeIn();
					$("#"+form).fadeOut();	
					setTimeout(function(){
						$("#"+success).fadeOut();
						$("#"+form).fadeIn();	
					},2000)
					
				}else if(data.includes("Duplicate"))
				{
					$("#"+success).html("Already Subscribed to Newsletter").fadeIn(); 
					$("#"+form).fadeOut();	
					setTimeout(function(){
						$("#"+success).fadeIn();
						$("#"+form).fadeOut();	
					},2000)
				}else
				{
					$("#"+error).fadeIn();
					$("#"+form).fadeOut();
					setTimeout(function(){
						$("#"+error).fadeOut();
						$("#"+form).fadeIn();	
					},2000)
				}
        },
        error:function()
        {

        }
    
		})
	}
	 
</script>