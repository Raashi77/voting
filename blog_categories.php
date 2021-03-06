<?php

    require_once "lib/core.php";



    if(isset($_GET['cat']) && !empty($_GET['cat']) )
    {

        $token = $_GET['cat'];
        $sql="SELECT b.id,b.title,b.image,bc.category as bc_category,bc.color,b.timestamp from blogs b,blog_categories bc where bc.category LIKE '%$token%' and b.status=1 group by b.id order by b.timestamp desc";
    }
    else if(isset($_GET['tag']) && !empty($_GET['tag']) )
    {
        $token = $_GET['tag']; 
        $sql="SELECT b.id,b.title,b.image,bc.category as bc_category,bc.color,b.timestamp from blogs b,blog_categories bc where  tags LIKE '%$token%' and b.status=1 group by b.id order by b.timestamp desc";
    }
    $result = $conn->query($sql);
    if($result->num_rows)
    {
        while($row=$result->fetch_assoc())
        {
            $blogs[] = $row;
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

<!DOCTYPE html> 
<html>  
<head>
    <meta charset="utf-8" />
    <title>DuBuddy</title>
    <meta content="DuBuddy: <?=$token?>" property="og:title" />
    <meta content="" property="og:image" />
    <meta content="DuBuddy: <?=$token?>" property="twitter:title" />
    <meta content="" property="twitter:image" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="dubuddy" name="generator" />
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
   <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
	<link rel="manifest" href="./images/site.webmanifest">
	<link rel="mask-icon" href="./images/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="./images/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="./images/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="page-wrapper">
        
        <div data-collapse="medium" data-animation="default" data-duration="400" id="Navigation" data-w-id="68906341-c776-5606-916e-b44fde4e642a" role="banner" class="nav-bar-v1 w-nav">
            <div class="wrapper nav-bar-v1-wrapper">
                <a href="#" class="nav-brand-v1 w-nav-brand"><img src="images/dublogo.png" alt="" class="nav-logo" />
                    <div class="nav-logo-text">DuBuddy</div>
                </a>
                <nav role="navigation" class="nav-menu-v1 w-nav-menu">
                    <!-- <form action="https://reader-template.webflow.io/search" class="search-form w-form">
                        <input type="search" class="search-form-input w-input" maxlength="256" name="query" placeholder=" Search..." id="search" required="" /><input type="submit" value=" " class="search-button w-button" />
                    </form>  -->
                    <div data-hover="1" data-delay="400" class="dropdown w-dropdown">
                        <div class="nav-link w-dropdown-toggle">
                            <div>Home</div>
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
        <div id="Hero" class="section hero about-hero">
            <div class="wrapper w-container">
                <div class="page-intro">
                    <h1 class="page-heading"><?=ucfirst($token)?></h1>
                    <!-- <h1 class="page-heading"> Category</h1> -->
                </div>
            </div>
        </div>
        <!-- <div class="section no-padding-vertical">
            <div class="wrapper w-container">
                <div class="breadcrumbs"><a href="https://reader-template.webflow.io/" class="breadcrumbs-link">Home</a>
                    <div class="breadcrumbs-divider">/</div>
                    <div>Categories</div>
                    <div class="breadcrumbs-divider">/</div>
                    <div>Culture</div>
                </div>
            </div>
        </div> -->
        <div class="section top-section">
            <div class="wrapper w-container">
                <div class="content-with-sidebar">
                    <div class="side-posts w-dyn-list">
                        <div role="list" class="grid-list w-dyn-items">
                            <?php
                                if(isset($blogs))
                                {
                                    foreach($blogs as $blog)
                                    {
                                ?>
                                
                                    <div role="listitem" class="w-dyn-item">
                                        <div class="post-v3-card">
                                            <a href="view_blog?token=<?=$blog['id']?>" class="post-v3-thumbnail w-inline-block">
                                                <div class="badge"><?=$blog['bc_category']?></div>
                                                <div style="background-image:url(<?=$blog['image']?>)" class="thumbnail"></div>
                                            </a>
                                            <div class="post-v3-content">
                                                <a href="view_blog?token=<?=$blog['id']?>" class="post-heading-link w-inline-block">
                                                    <h3 class="post-v3-heading"><?=ucfirst($blog['title'])?></h3>
                                                </a>
                                                <div class="post-summary"><?= substr($blog['short_des'],0,100);?></div>
                                                <div class="post-info"><a href="#" class="post-info-author w-inline-block">
                                                        <!-- <div style="background-image:url(_https_/assets.website-files.com/5d04fc355b89160a98bf3697/5d09f1e7887607482e5d6154_team-member-5-avatar.html)" class="post-card-avatar"></div> -->
                                                        <div> <?=$blog['name']?></div>
                                                        <div class="divider-small"></div>
                                                    </a>
                                                    <div class="post-info-block">
                                                        <i class="fa fa-calendar mini-icon-grey"></i>
                                                        <div><?php
                                                                $date=date_create($blog['timestamp']);
                                                                echo date_format($date,"M d Y");
                                                        ?></div>
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
                        <div class="w-pagination-wrapper pagination">
                            <div class="pagination-left"></div>
                            <div class="pagination-right"></div>
                        </div>
                    </div>

                    <div class="sidebar">
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
        <a href="#Navigation" class="up-button w-inline-block"></a>
    </div>
    <?php
        require_once 'js-links.php';
    ?>
    </body>
 
</html>