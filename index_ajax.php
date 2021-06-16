<?php

    require_once './lib/core.php';

    if(isset($_GET['fetch']))
    {
        $res=[];
        $blogHtml = "";
        $scriptSrc = "";
        $sql="select * from blogs order by timestamp desc limit 3";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row = $result->fetch_assoc())
                {
                    $id = $row['id'];
                    $shortDesc = $row['short_des'];
                    $imgsrc = $row['image'];
                    $title = $row['title'];
                    $blogHtml .= "  <div class='col-lg-4 mt-4'>
                                        <div class='p-2'>
                                            <div class='card'>
                                                <img class='card-img-top' src='$imgsrc' alt='Card image cap'>
                                                <div class='card-body pb-0'>
                                                    <h3 class='card-title'>$title</h3>
                                                    <p class='card-text'>$shortDesc</p>
                                                </div>
                                            </div>
                                            <a href='viewBlog$id'>
                                                <div class='text-right pr-2' style='font-size:34px;'>
                                                    <i class='fas fa-chevron-circle-right'></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>";
                }
                $res['blog'] = $blogHtml;
            }
        }
        else
        {
            echo $conn->error;
        }
        $sql="select * from features";
        $featureHtml = "";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row = $result->fetch_assoc())
                {
                    $name=$row['name'];
                    $description = $row['description'];
                    $icon = $row['icon'];
                    $featureHtml .= "<div class='pl-5 d-flex'>
                                        <div>
                                            <i class='$icon' style='font-size: 38px;'></i>
                                        </div>
                                        <div class='ml-3'>
                                            <h3>$name</h3>
                                            <p>
                                                $description
                                            </p>
                                        </div>
                                    </div>";
                }
                $res['features'] = $featureHtml;
            }
        }

        $sql="select * from videos order by time_stamp desc limit 6";
        $videos = "
                    
                    <div class='box1'>
                        <div class='videoslick' >";
        if($result =  $conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row = $result->fetch_assoc())
                {
                    $vidSrc = $row['video'];
                    $videos .="<div class=''>
                                    <video  class='' controls>
                                            <source src = '$vidSrc' type = 'video/mp4'>
                                            This browser doesn't support video tag.
                                    </video>
                                </div>";
                }
                $videos .= "</div></div>
                <div class='box1 box2'>
 		            	<img src='assets/image/shadowtriangle.png' height='650px;' width='110%' alt='Image'>
 		            </div>
 		            <div class='box1 box3'>
 		            	<h2 class='text-light'>Video Gallery</h2>
 		            	<button class='primary_button mt-3'>View All</button>
 		            </div>

 		            <div class='box1 box3 text-center'>
 		            	 <img src='assets/image/play_button.png' style='margin-top: 260px;' width='120' alt='Image'> 
 		            </div>
                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js'></script>
                       
                        ";
            }
            $res['video'] = $videos;
        }    
        else
        {
            echo $conn->error;
        }
        $songsHtml = "";
        $sql="select * from  songs  ";
        if($result=$conn->query($sql))
        {
            if($result->num_rows)
            {
                while($row=$result->fetch_assoc())
                {
                    $songsHtml .= "";
                }
            }
        }
        $res['script'] = $scriptSrc;
        echo json_encode($res);
    }
?>
