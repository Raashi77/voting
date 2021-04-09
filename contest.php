<?php
require_once "header.php";
require_once "navbar.php";
if(isset($_POST['vote']))
{
    $cu_id=$_POST['vote'];
    $email=$_POST['email'];
    $ip_address=get_client_ip();
    if(isset($_GET['token'])&&!empty($_GET['token']))
    {
        $token=$_GET['token'];
    }
    $sql="select * from voters where cu_id='$cu_id' and c_id='$token' and ip_address='$ip_address'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows>0)
        {
            $errorMember="You Have Already Voted";
        }
        else
        {
            $sql="insert into voters(email, ip_address, c_id, cu_id, status) values('$email', '$ip_address', '$token', '$cu_id', 1)";
            if($conn->query($sql))
            {
                $resMember = true;
            }
            else
            {
                $errorMember=$conn->error;
            }
            $sql="update contest_users set votes=votes+1 where c_id='$token' and id='$cu_id'";
            if($conn->query($sql))
            {
                $resMember = true;
            }
            else
            {
                $errorMember=$conn->error;
            }
        }
    } 
}

if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
    $sql="select cu.*,u.id as u_id ,u.name from contest_users cu, users u where cu.c_id='$token' and cu.u_id=u.id";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $cid = $row['id']; 
            $uid = $row['u_id'];
            $users[$cid] = $row;

              $sql = "select video,file_type from videos v where v.u_id =$uid and v.c_id='$token'";
            $res =$conn->query($sql);
            if($res->num_rows)
            {
                while($row1 = $res->fetch_assoc())
                {
                    $users[$cid]['videos'][] = $row1;
                }
            }
        }
     
    }
    $sql="select count(id) as count from contest_users where c_id='$token'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                $c_users = $row['count'];
        }
    }

    $sql="select * from index_changes where c_id='$token'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                $changes = $row;
        }else
        {
            header("Location:error404");
        }
    }
}else
{
        header("Location:error404");
}

?>
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/foodModel.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
 
    <div class="fix home-blog-area pb-90 pt-90">
        
        <img id="foodModel_headingImg" src="<?=$changes['header_image']?>">
        <?php
            if(isset($errorMember))
            {
        ?>
        <div class="alert alert-danger"><?=$errorMember?></div>
        <?php
                    
                }
        ?>
        <div id="foodModel_heading_Div" class="fix home-blog-area pb-90 pt-90" >
            <h5 id="foodModel_heading_h5" style="color:<?=$changes['title_color']?>;"> <?=$changes['title']?></h5>
            <p id="foodModel_heading_p" style="color:<?=$changes['subtitle_color']?>;"><?=$changes['subtitle']?></p>

        </div>
    </div>
    <?php
    if($c_users>=1)
    {
    ?>

        <div class="container" style="margin-top:30px">

        <h6 id="foodModel_heading2" style="color:<?=$changes['body_title_color']?>"><?=$changes['body_title']?></h6>
        <div class="container" style="margin-bottom:30px;">
            <p id="foodModel_mainPara" style="<?=$changes['body_subtitle_color']?>"><?=$changes['body_subtitle']?></p>

        </div>
        <div class="row" id="foodModel_cardMain">


            <?php
            if(isset($users))
            {
                $i=1;
                foreach($users as $data)
                {
        ?>
            <div class="col-md-4 col-sm-4 col-xs-12" id="foodModel_card">
                
                <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="3000" data-pause="hover">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <?php
                            $counter=0;
                            foreach($data["videos"] as $videos)
                            {
                                $active_slide="";
                                if($counter==0)
                                {
                                    $active_slide="active";
                                }
                    ?> 
                            <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?=$active_slide?>"></li> 
                    <?php
                    $counter++;
                            }
                    ?> 
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <?php
                            $counter=0;
                            foreach($data["videos"] as $videos)
                            {
                                $active_slide="";
                                if($counter==0)
                                {
                                    $active_slide="active";
                                }
                    ?> 
                        
                            <div class="item <?=$active_slide?>">
                                <video width="100%" height="300" controls>
                                    <source src="<?=$videos['video']?>"  > 
                                    Your browser does not support HTML video.
                                </video>
                            </div>
                    <?php
                            $counter++;
                            }
                    ?> 
                    

                        <!-- <div class="item">
                        <img id="foodModel_img" src="images/icecream1.jpg" style="width:100%">
                        </div>

                        <div class="item">
                        <img id="foodModel_img" src="images/icecream1.jpg" style="width:100%">
                        </div> -->
                    </div>

                    <!-- Left and right controls -->
                    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev" >
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next" >
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                </div> 
            <div>
                <h6 id="foodModel_cardHeading">
                    <b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>"><?=$data['name']?></b>
                </h6>
                <p id="foodModel_cardPara"  ><?=$data['description']?></p>
                <center><h6 id="foodModel_cardVotes" class="votecolor"
                    style="color:<?=$changes['vote_color']?>;"><?=$data['votes']?>
                </h6></center>
                <form method="post">
                    <div class="input-group input-group-sm mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <button id="foodModel_cardButton" type="submit" name="vote"
                        class=" foodModel_cardButton form-control" value="<?=$data['id']?>"
                        style="background-color:<?=$changes['btn_color']?>">Vote</button>
                </form>
            </div>
        </div>
        <?php
                $i++;
                }
            }
        ?>
        </div>

        </div>

    <?php
    }
    else
    {
    ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>No Users <span>Till Now</span></h2>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    

</body>

</html>
<?php

require_once "js-links.php";
?>