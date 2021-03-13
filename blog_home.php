<?php
 require_once 'header.php';
 require_once 'navbar.php';  
$sql = "select b.id,b.title,b.image,bc.category as bc_category,bc.color,b.timestamp from blogs as b,blog_categories bc where status=1 and featured=1 and b.category=bc.id order by b.timestamp limit 4";
$result = $conn->query($sql);
if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $featuredBlog[] = $row;
    }
}

$sql = "select b.id,b.title,b.image,bc.category as bc_category,bc.color,b.timestamp from blogs as b,blog_categories bc where status=1 and b.category=bc.id order by b.timestamp limit 40";
$result = $conn->query($sql);
if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $recentBlog[] = $row;
    }
}

$sql = "select b.id,b.title,b.image,bc.category as bc_category,bc.color,b.timestamp from blogs as b,blog_categories bc where status=1 and b.category=bc.id and b.category in(select distinct(category) from blogs where status=1) GROUP by b.category order by b.timestamp limit 10";
$result = $conn->query($sql);
if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $catBlog[] = $row;
    }
}

$sql = "select bc.category,bc.color from blogs as b,blog_categories as bc  where bc.id=b.category and b.status=1 group by bc.category";
$result = $conn->query($sql);
if($result->num_rows)
{
    
    while($row = $result->fetch_assoc())
    {
        $allCat[] = $row;
    } 
}

$sql = "select tags from blogs where status=1";
$result = $conn->query($sql);
if($result->num_rows)
{
    
    while($row = $result->fetch_assoc())
    {
        $alltags[] = explode(",",$row['tags']); 
    }
}
?>
 
    
    <link href="./css/blog_new.css" rel="stylesheet" type="text/css" />
    <script src="./js/webfont/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic",
                    "Noto Sans HK:regular,500,700"
                ]
            }
        });
    </script>
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
 
 
    <div class="page-wrapper">
        <!-- <div class="subscribe-popup">
            <div class="popup">
                <a data-w-id="815c6cd4-8036-9e9d-af11-10e598a3accc" href="#" class="close-button w-inline-block">
                    <img src="./images/5d06166e6a93604d0a953a2e_x.svg"
                        alt="" />
                </a>
                <div class="subscribe-popup-image">

                </div>
                <div class="popup-info">
                    <h3>📬 <br />Sign Up for Our Amazing Newsletter!</h3>
                    <p class="paragraph-small text-grey">Writing result-oriented ad copy is difficult, as it must appeal
                        to, entice, and convince consumers to take action.</p>
                    <div class="full-width w-form">
                        <form id="wf-form-Footer-Form" name="wf-form-Footer-Form" data-name="Footer Form"
                            class="subscribe-popup-grid">
                            <input type="email" class="input w-input" maxlength="256" name="Footer-Subscribe-2"
                                data-name="Footer Subscribe 2" placeholder="Email address" id="Footer-Subscribe-2"
                                required="" />
                            <input type="submit" value="Subscribe" class="button w-button" />
                        </form>
                        <div class="form-success w-form-done">
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
        <!-- <div class="post-popup w-dyn-list">
            <div role="list" class="w-dyn-items">
                <div role="listitem" class="w-dyn-item">
                    <div class="post-popup-block">
                        <a href="https://reader-template.webflow.io/posts/where-can-you-find-free-webflow-resources"
                            class="post-popup-thumbnail w-inline-block">
                            <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d08cce99dc2ef40beb40ceb_boris-smokrovic-146294-unsplash-thumb.html)"
                                class="thumbnail">
                            </div>
                        </a>
                        <div class="post-popup-content">
                            <a href="https://reader-template.webflow.io/posts/where-can-you-find-free-webflow-resources"
                                class="post-heading-link w-inline-block">
                                <h6 class="post-popup-heading">Where can you find free Webflow resources</h6>
                            </a>
                            <div class="post-info">
                                <img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg"
                                    alt="" class="mini-icon-grey" />
                                <div>3</div>
                                <div> min read</div>
                            </div>
                        </div>
                        <div class="post-popup-badge">New Post</div>
                        <a data-w-id="8b0165ac-f1cf-dda3-dd01-d885c1357af5" href="#"
                            class="post-popup-close w-inline-block">
                            <img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166e6a93604d0a953a2e_x.svg"
                                width="12" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="top-bar-container">
            <div class="wrapper">
                <div class="top-bar">
                    <div class="top-bar-left">
                        <a href="https://reader-template.webflow.io/become-a-partner" class="top-bar-link">Become a
                            Partner</a>
                        <a href="https://reader-template.webflow.io/contact-3/contact-1"
                            class="top-bar-link">Contribute</a>
                        <a href="https://reader-template.webflow.io/privacy-policy" class="top-bar-link">Terms &amp;
                            Privacy</a>
                    </div>
                    <div class="top-bar-right">
                        <a href="https://reader-template.webflow.io/" class="top-bar-link w-inline-block">
                            <img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d0616bce1a868fceaa146e0_dollar-sign-white.svg"
                                alt="" class="top-bar-icon" />
                            <div>Buy Reader</div>
                        </a>
                        <div class="top-bar-divider"></div>
                        <a href="https://elasticthemes.com/" target="_blank" class="top-bar-link w-inline-block">
                            <img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d0616bd1b310b1851bf87d2_grid-white.svg"
                                alt="" class="top-bar-icon" />
                            <div>More Templates</div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        
        <?php
        require_once 'header.php';
        require_once 'navbar.php';  
         if (isset($featuredBlog)) {
        ?>
        <div class="section no-padding">
            <div class="w-dyn-list">
                <div role="list" class="grid-full-medium w-dyn-items">
                    <?php
                   
                        foreach ($featuredBlog as $blog) {
                    ?>
                            <div role="listitem" class="full-height w-dyn-item">
                                <a href="viewBlog<?=$blog['id']?>" class="post-card-v3-medium w-inline-block">
                                    <div class="post-card-content">
                                        <div style="background-color:<?=$blog['color']?>" class="badge"><?=$blog['bc_category']?>

                                        </div>
                                        <h3 class="post-v2-heading"><?=$blog['title']?>
                                        </h3>
                                        <div class="post-info text-white">
                                            <div class="post-info-block"><i class="fa fa-calendar" style="margin-right: 10px;"></i>
                                                <div>
                                                    <?php 
                                                        $date=date_create($blog['timestamp']);
                                                         echo date_format($date,"M d Y"); 
                                                    ?> 
                                                </div>
                                            </div>
                                            <div class="post-info-block">
                                                <div class="divider-small transparent">

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-gradient">

                                    </div>
                                    <div style="background-image:url(<?=$blog['image']?>)" class="thumbnail">
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    


                    ?>

                    
                </div>
            </div>
        </div>
        <?php
        }
        ?>
         

        <?php
            if(isset($recentBlog))
            {

            
        ?>
        <div class="section">
            <div class="wrapper w-container">
                <div class="header-block side-margins">
                    <h3 class="header">Recent Posts</h3>
                    <!-- <a href="https://reader-template.webflow.io/post-grids/list-sidebar-right" class="more-link w-inline-block">
                        <div>View All

                        </div>
                        <div class="more-link-icon"><i class=" fa fa-arrow-right more-link-arrow-hover"></i>
                        </div>
                    </a> -->
                    <div class="header-line">

                    </div>
                </div>
                <div class="w-dyn-list">
                    <div role="list" class="grid-medium w-dyn-items">
                        <?php
                            $counter=1;
                            foreach($recentBlog as $blog)
                            {

                                if($counter%8==0)
                                {
                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="section banner-section">
                                            <div class="wrapper side-paddings w-container"><a href="https://elasticthemes.com/" target="_blank" class="banner-728x90 w-inline-block"><img src="../../assets.website-files.com/5d04fc355b8916913bbf365a/5d10972cd440f4638e9fbd84_banner-728x90.jpg" sizes="(max-width: 767px) 100vw, 728px" srcset="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d10972cd440f4638e9fbd84_banner-728x90-p-500.jpeg 500w, https://assets.website-files.com/5d04fc355b8916913bbf365a/5d10972cd440f4638e9fbd84_banner-728x90-p-800.jpeg 800w, https://assets.website-files.com/5d04fc355b8916913bbf365a/5d10972cd440f4638e9fbd84_banner-728x90-p-1080.jpeg 1080w, https://assets.website-files.com/5d04fc355b8916913bbf365a/5d10972cd440f4638e9fbd84_banner-728x90.jpg 1456w" alt="" /></a>
                                            </div>
                                         </div> -->
                                        <div class="section top-section">
                                            <div class="wrapper w-container">
                                                <div class="w-dyn-list">
                                                    <div role="list" class="grid-small w-dyn-items">
                                    
                                    <?php
                                }
                            ?>

                                 <div role="listitem" class="w-dyn-item">
                                    <div class="post-card">
                                        <a href="viewBlog<?=$blog['id']?>" class="thumbnail-medium w-inline-block">
                                            <div style="background-color:<?=$blog['color']?>" class="badge"><?=$blog['bc_category']?>

                                            </div>
                                            <div style="background-image:url(<?=$blog['image']?>)" class="thumbnail">
                                            </div>
                                        </a>
                                        <a href="viewBlog<?=$blog['id']?>" class="post-heading-link w-inline-block">
                                            <h4 class="post-heading-medium"><?=ucfirst($blog['title'])?></h4>
                                        </a>
                                        <div class="post-info">
                                            <div class="post-info-block"><i class="fa fa-calendar" style="margin-right:10px"></i>
                                                <div><?php $date=date_create($blog['timestamp']);
                                                echo date_format($date,"M d Y"); ?>

                                                </div>
                                            </div>
                                            <div class="post-info-block">
                                         
                                            </div>
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
        <?php
            }

           
        ?>
         
       
        <div class="section">
            <div class="wrapper w-container">
                <div class="content-with-sidebar">
                    <div class="sidebar left">
                        <?php 
                            if(isset($allCat))
                            {
                        ?>
                        <div class="sidebar-block">
                            <div class="header-block">
                                <h4 class="header">Categories</h4>
                                <div class="header-line">

                                </div>
                            </div>
                            <div class="w-dyn-list">
                                <div role="list" class="sidebar-categories w-dyn-items">
                                    <?php
                                          foreach($allCat as $cat)
                                          {
                                    ?>
                                            <div role="listitem" class="w-dyn-item">
                                                <a href="blog_categories?cat=<?=$cat['category']?>" class="sidebar-category w-inline-block">
                                                    <div style="background-color:<?=$cat['color']?>" class="category-color-line">

                                                    </div>
                                                    <div class="sidebar-category-name"><?=$cat['category']?>

                                                    </div>
                                                    <i class="fa fa-arrow-right category-arrow"></i>
                                                </a>
                                            </div>
                                    <?php
                                          }
                                    ?>
                                    
                                    <!-- <div role="listitem" class="w-dyn-item">
                                        <a href="https://reader-template.webflow.io/categories/events" class="sidebar-category w-inline-block">
                                            <div style="background-color:#00c2e9" class="category-color-line">

                                            </div>
                                            <div class="sidebar-category-name">Events

                                            </div><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166dc9e4d6b15bd0dcd3_right.svg" alt="" class="category-arrow" />
                                        </a>
                                    </div> -->
                                    <!-- <div role="listitem" class="w-dyn-item">
                                        <a href="https://reader-template.webflow.io/categories/lifestyle" class="sidebar-category w-inline-block">
                                            <div style="background-color:#5d66fe" class="category-color-line">

                                            </div>
                                            <div class="sidebar-category-name">Lifestyle

                                            </div><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166dc9e4d6b15bd0dcd3_right.svg" alt="" class="category-arrow" />
                                        </a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item">
                                        <a href="https://reader-template.webflow.io/categories/tech" class="sidebar-category w-inline-block">
                                            <div style="background-color:#fa345a" class="category-color-line">

                                            </div>
                                            <div class="sidebar-category-name">Tech

                                            </div><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166dc9e4d6b15bd0dcd3_right.svg" alt="" class="category-arrow" />
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <?php
                            }

                            if(isset($alltags))
                            {
                                 
                        ?>
                        <div class="sidebar-block">
                            <div class="header-block">
                                <h4 class="header">Tags</h4>
                                <div class="header-line">

                                </div>
                            </div>
                            <div class="w-dyn-list">
                                <div role="list" class="sidebar-tags w-dyn-items">
                                    <?php
                                        foreach($alltags[0] as $tag)
                                        {
                                    ?>
                                             <div role="listitem" class="w-dyn-item"><a href="blog_categories?tag=<?=$tag?>" class="tag"><?=$tag?></a></div>
                                    <?php
                                        }
                                    ?>
                                   
                                    <!-- <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/advertising" class="tag">Advertising</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/aerial" class="tag">Aerial</a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/arhitecture" class="tag">Arhitecture</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/design" class="tag">Design</a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/development" class="tag">Development</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/fashion" class="tag">Fashion</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/finance" class="tag">Finance</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/future" class="tag">Future</a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/motivation" class="tag">Motivation</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/nature" class="tag">Nature</a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/photography" class="tag">Photography</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/travel" class="tag">Travel</a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/video" class="tag">Video</a>
                                    </div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/webflow" class="tag">Webflow</a></div>
                                    <div role="listitem" class="w-dyn-item"><a href="https://reader-template.webflow.io/tags/workspace" class="tag">Workspace</a></div> -->
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <!-- <div class="sidebar-block sticky"><a href="https://elasticthemes.com/" target="_blank" class="banner-sidebar w-inline-block"><img src="../../assets.website-files.com/5d04fc355b8916913bbf365a/5d0b6dc92ddabc5fb7819703_banner-sidebar.jpg" sizes="(max-width: 767px) 100vw, 320px" srcset="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d0b6dc92ddabc5fb7819703_banner-sidebar-p-500.jpeg 500w, https://assets.website-files.com/5d04fc355b8916913bbf365a/5d0b6dc92ddabc5fb7819703_banner-sidebar.jpg 640w" alt="" /></a>
                        </div> -->

                    </div>
                    <?php
                        if(isset($catBlog))
                        {
                    ?>
                            <div class="side-posts w-dyn-list">
                                <div role="list" class="grid-list w-dyn-items">
                                    <?php
                                        foreach($catBlog as $blog)
                                        {
                                    ?>
                                            <div role="listitem" class="w-dyn-item">
                                                <div class="post-v3-card">
                                                    <a href="viewBlog<?=$blog['id']?>" class="post-v3-thumbnail w-inline-block">
                                                        <div class="badge"><?=$blog['bc_category']?>
                                                        </div>
                                                        <div style="background-image:url(<?=$blog['image']?>)" class="thumbnail">
                                                        </div>
                                                    </a>
                                                    <div class="post-v3-content"><a href="viewBlog<?=$blog['id']?>" class="post-heading-link w-inline-block">
                                                            <h3 class="post-v3-heading"><?=$blog['title']?></h3>
                                                        </a>
                                                        <div class="post-summary"><?php
                                                            echo substr($blog['short_des'],0,100);
                                                        ?>

                                                        </div>
                                                        <div class="post-info"><a href="#" class="post-info-author w-inline-block">
                                                                <!-- <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d09f1e7887607482e5d6154_team-member-5-avatar.html)" class="post-card-avatar"> -->
                                                                <!-- </div> -->
                                                                <div><?=$blog['name']?>

                                                                </div>
                                                                <div class="divider-small">

                                                                </div>
                                                            </a>
                                                            <div class="post-info-block"><i class="fa fa-calendar" style="margin-right:10px"></i>
                                                                <div><?php $date=date_create($blog['timestamp']);
                                                                        echo date_format($date,"M d Y"); ?>

                                                                </div>

                                                            </div>
                                                            <div class="post-info-block">
                                                                
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                    <?php
                                        }
                                    ?>
                                    
                                  

                                </div> 
                            </div>
                    <?php
                        }
                    ?>
                </div>

            </div>

        </div>
        <!-- <div class="section">
            <div class="wrapper">
                <div class="header-block side-margins">
                    <h3 class="header">There is more</h3>
                    <div class="header-line">

                    </div>

                </div>
                <div class="w-dyn-list">
                    <div role="list" class="grid-mini w-dyn-items">
                        <div role="listitem" class="w-dyn-item">
                            <div class="post-mini"><a href="https://reader-template.webflow.io/posts/the-untold-secret-to-mastering-webflow-in-just-3-days" class="post-mini-thumbnail w-inline-block">
                                    <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d10bd33e03beec14118392c_annie-spratt-61560-unsplash-thumb.html)" class="thumbnail">
                                    </div>
                                </a>
                                <div class="post-mini-content"><a href="https://reader-template.webflow.io/posts/the-untold-secret-to-mastering-webflow-in-just-3-days" class="post-heading-link w-inline-block">
                                        <h5 class="post-mini-heading">The untold secret to mastering Webflow in just 3
                                            days</h5>
                                    </a>
                                    <div class="post-info"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg" alt="" class="mini-icon-grey" />
                                        <div>4

                                        </div>
                                        <div> min read

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div role="listitem" class="w-dyn-item">
                            <div class="post-mini"><a href="https://reader-template.webflow.io/posts/the-single-most-important-thing-you-need-to-know-about-web-design" class="post-mini-thumbnail w-inline-block">
                                    <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d10bd477ad68c42d7d5657f_brigitte-tohm-147669-unsplash-thumb.html)" class="thumbnail">
                                    </div>
                                </a>
                                <div class="post-mini-content"><a href="https://reader-template.webflow.io/posts/the-single-most-important-thing-you-need-to-know-about-web-design" class="post-heading-link w-inline-block">
                                        <h5 class="post-mini-heading">The single most important thing you need to know
                                            about web design</h5>
                                    </a>
                                    <div class="post-info"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg" alt="" class="mini-icon-grey" />
                                        <div>2

                                        </div>
                                        <div> min read

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div role="listitem" class="w-dyn-item">
                            <div class="post-mini"><a href="https://reader-template.webflow.io/posts/everything-you-wanted-to-know-about-webflow-and-were-too-embarrassed-to-ask" class="post-mini-thumbnail w-inline-block">
                                    <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d10bd70778c1f547280a434_harley-davidson-1628420-unsplash-thumb.html)" class="thumbnail">
                                    </div>
                                </a>
                                <div class="post-mini-content"><a href="https://reader-template.webflow.io/posts/everything-you-wanted-to-know-about-webflow-and-were-too-embarrassed-to-ask" class="post-heading-link w-inline-block">
                                        <h5 class="post-mini-heading">Everything you wanted to know about Webflow</h5>
                                    </a>
                                    <div class="post-info"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg" alt="" class="mini-icon-grey" />
                                        <div>6

                                        </div>
                                        <div> min read

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div role="listitem" class="w-dyn-item">
                            <div class="post-mini"><a href="https://reader-template.webflow.io/posts/how-to-win-clients-and-influence-markets-with-elastic-themes" class="post-mini-thumbnail w-inline-block">
                                    <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d10bd91cbe475e7274750ce_marco-xu-1136478-unsplash-thumb.html)" class="thumbnail">
                                    </div>
                                </a>
                                <div class="post-mini-content"><a href="https://reader-template.webflow.io/posts/how-to-win-clients-and-influence-markets-with-elastic-themes" class="post-heading-link w-inline-block">
                                        <h5 class="post-mini-heading">How to win clients and influence markets with
                                            Elastic Themes</h5>
                                    </a>
                                    <div class="post-info"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg" alt="" class="mini-icon-grey" />
                                        <div>1

                                        </div>
                                        <div> min read

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div role="listitem" class="w-dyn-item">
                            <div class="post-mini"><a href="https://reader-template.webflow.io/posts/its-all-about-web-development" class="post-mini-thumbnail w-inline-block">
                                    <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d10bdaee03beeca3d1839bb_nourdine-diouane-225316-unsplash-thumb.html)" class="thumbnail">
                                    </div>
                                </a>
                                <div class="post-mini-content"><a href="https://reader-template.webflow.io/posts/its-all-about-web-development" class="post-heading-link w-inline-block">
                                        <h5 class="post-mini-heading">It&#x27;s all about web development</h5>
                                    </a>
                                    <div class="post-info"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg" alt="" class="mini-icon-grey" />
                                        <div>3

                                        </div>
                                        <div> min read

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div role="listitem" class="w-dyn-item">
                            <div class="post-mini"><a href="https://reader-template.webflow.io/posts/master-your-new-template-in-5-easy-steps" class="post-mini-thumbnail w-inline-block">
                                    <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d10c057e03beeed70183e48_derick-mckinney-1648228-unsplash-thumb.html)" class="thumbnail">
                                    </div>
                                </a>
                                <div class="post-mini-content"><a href="https://reader-template.webflow.io/posts/master-your-new-template-in-5-easy-steps" class="post-heading-link w-inline-block">
                                        <h5 class="post-mini-heading">Master your new template in 5 easy steps</h5>
                                    </a>
                                    <div class="post-info"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d04fc355b89169e22bf36ad_clock.svg" alt="" class="mini-icon-grey" />
                                        <div>3

                                        </div>
                                        <div> min read

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div> -->
        <!-- <div class="section">
            <div class="wrapper w-container">
                <div class="connect"><a href="https://twitter.com/" target="_blank" class="connect-link w-inline-block">
                        <div class="connect-icon"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166d5b89162cd1c17b99_twitter.svg" alt="" />
                        </div>
                        <div class="connect-link-text">Twitter

                        </div>
                    </a><a href="https://facebook.com/" target="_blank" class="connect-link w-inline-block">
                        <div class="connect-icon"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166be1a8681b55a14434_facebook.svg" alt="" />
                        </div>
                        <div class="connect-link-text">Facebook

                        </div>
                    </a><a href="https://instagram.com/" target="_blank" class="connect-link w-inline-block">
                        <div class="connect-icon"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166e6a9360c887953a2f_instagram.svg" alt="" />
                        </div>
                        <div class="connect-link-text">Instagram

                        </div>
                    </a><a href="https://youtube.com/" target="_blank" class="connect-link w-inline-block">
                        <div class="connect-icon"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166e5b8916d48dc17b9b_youtube.svg" alt="" />
                        </div>
                        <div class="connect-link-text">YouTube

                        </div>
                    </a><a href="https://pinterest.com/" target="_blank" class="connect-link w-inline-block">
                        <div class="connect-icon"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166ce1a8686f9da14436_pinterest.svg" alt="" />
                        </div>
                        <div class="connect-link-text">Pinterest

                        </div>
                    </a><a data-w-id="e216d214-04e3-d10d-1b0f-037beea8074d" href="#" class="connect-link w-inline-block">
                        <div class="connect-icon"><img src="https://assets.website-files.com/5d04fc355b8916913bbf365a/5d06166c85f49b70d3a626f1_mail.svg" alt="" />
                        </div>
                        <div class="connect-link-text">Newsletter

                        </div>
                    </a>
                </div>

            </div>

        </div> -->
         
        <a href="#Navigation" class="up-button w-inline-block"></a>
    </div>
    <?php
    require_once 'js-links.php';
    ?>
     
</body>

</html>