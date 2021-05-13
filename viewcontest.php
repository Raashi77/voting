
<?php
require_once "header.php";
require_once "navbar.php";
if(isset($_POST['vote']))
{
    $cu_id=$_POST['vote'];
    $email=$_POST['email'];
    $ip_address=get_client_ip();
    // if(isset($_GET['token'])&&!empty($_GET['token']))
    // {
    //     $token=$_GET['token'];
    //     // echo $token;
    // }
    $con_id = $_POST['contest_id'];
    $sql="select * from voters where c_id='$con_id' and ip_address='$ip_address'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows>0)
        {
            $errorMember="You Have Already Voted";
        }
        else
        {
           $sql="insert into voters(email, ip_address, c_id, cu_id, status) values('$email', '$ip_address', '$con_id', '$cu_id', 1)";
            if($conn->query($sql))
            {
                $resMember = true;
            }
            else
            {
                $errorMember=$conn->error;
            }
            $sql="update contest_users set votes=votes+1 where c_id='$con_id' and id='$cu_id'";
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
    // echo $token;
    $sql="select v.*,c.* from videos v ,contest c where v.id='$token' and v.c_id = c.id";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        // echo $sql ;
        while($row = $result->fetch_assoc())
        {
            $uid = $row['u_id'];
            $details = $row;
            $contest_id = $row['c_id'];
            $sql = "select * from users where id='$uid'";
            $res =$conn->query($sql);
            if($res->num_rows)
            {
                
                    $users = $res->fetch_assoc();
               
            }
            $sql = "select votes, id from contest_users where c_id='$contest_id' and u_id='$uid'";
            $res =$conn->query($sql);
            if($res->num_rows)
            {
                $row = $res->fetch_assoc();
                $votes=$row;
               
            }
        }
     
    }
    // print_R($users);
    $sql="select count(id) as count from contest_users where c_id='$contest_id'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                $c_users = $row['count'];
        }
    }
    else
    {
        echo $conn->error;
    }

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
        else  
            $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];    
        
        // echo $url;

    // $sql="select * from index_changes where c_id='$token'";
    // if($result =  $conn->query($sql))
    // {
    //     if($result->num_rows)
    //     {
    //         $row = $result->fetch_assoc();
    //             $changes = $row;
    //     }else
    //     {
    //         header("Location:error404");
    //     }
    // }
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
    <style>
        #comments{margin-left:30px;width:92%;}
        #whatsapp{display:none;}
        @media only screen and (max-width: 600px) {
           #comments{margin-left:27px;width:82%;}
           #whatsapp{display:initial;}
        }
    </style>
 
    <div class="fix home-blog-area pb-90 pt-90" style="padding-bottom:0">
        
        
        <div id="foodModel_heading_Div" class="fix home-blog-area pb-90 pt-90" >
            <h5 id="foodModel_heading_h5" style="color:<?=$changes['title_color']?>;"> <?=$changes['title']?></h5>
            <p id="foodModel_heading_p" style="color:<?=$changes['subtitle_color']?>;"><?=$changes['subtitle']?></p>

        </div>
    </div>
    <?php
    if($c_users>=1)
    {
    ?>

        <div class="container" style="margin-top:40px">
        <div id="shareonlaptop">
            
            
            <center>
            <h4 style="color:white">Share</h4>
                <div class="input-group mb-3" style="display:none">
                    <input type="text" class="form-control" id="url" value="<?=$url?>" >
                    <div class="input-group-append">
                        
                    </div>
                </div>
                <button class="btn btn-primary" type="button" id="button-addon2" data-toggle="tooltip" onclick="Copy()" data-placement="top" title="Copy Url">
                    <i class="fas fa-copy"></i> Copy url</button>
                <a href="whatsapp://send?text=<?=$url?>" class="btn btn-success " target="_blank" id="whatsapp"><i class="bi bi-whatsapp"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>" target="_blank" class="btn btn-primary " id="facebook"><i class="bi bi-facebook"></i></a>
                <a href="http://www.twitter.com/share?url=<?=$url?>" class="btn btn-info " target="_blank" id="twitter"><i class="bi bi-twitter"></i></a>
                <p id="p2" style="color:white;margin-top:10px" ></p>
            </center>
            <?php
                if(isset($errorMember))
                {
            ?>
            <div class="alert alert-danger"><?=$errorMember?></div>
            <?php
                        
                    }
            ?>
        </div>

        <h6 id="foodModel_heading2" style="color:<?=$changes['body_title_color']?>"><?=$changes['body_title']?></h6>
        <div class="container" style="margin-bottom:30px;">
            <p id="foodModel_mainPara" style="<?=$changes['body_subtitle_color']?>"><?=$changes['body_subtitle']?></p>

        </div>
        <div class="row" id="foodModel_cardMain">


            <?php
            
        ?>
            <div class="col-md-11 col-sm-11 col-xs-12" id="foodModel_card" style="background-color: white;">
                
                <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="3000" data-pause="hover">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <?php
                            
                    ?> 
                            <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?=$active_slide?>"></li> 
                    <?php
                    
                    ?> 
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner active">
                    <?php
                            
                    ?> 
                        
                            <div class="item active">
                                <video width="100%" height="300"  preload="metadata" controls>
                                    <source src="<?=$details['video']?>#t=0.1"  > 
                                    Your browser does not support HTML video.
                                </video>
                            </div>
                    <?php
                    ?> 
                    

                        
                    </div>

                    
                </div>
            <div>
                <h6 id="foodModel_cardHeading">
                    <b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>"><?=$data['name']?></b>
                </h6>
                <p id="foodModel_cardPara"  ><?=$data['description']?></p>
                <form method="post">
                    <div class="row">             
                        <div class="col-6">
                            <input type="hidden" value="<?=$contest_id?>" name="contest_id">
                            <!-- <input type="hidden" value="<?=$votes['id']?>" name="cu_id"> -->
                            <div class="input-group input-group-sm mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                        <div class="col-6">
                            <button id="foodModel_cardButton" type="submit" name="vote"
                                class=" foodModel_cardButton form-control" value="<?=$votes['id']?>"
                                style="background-color:<?=$changes['btn_color']?>">Vote</button>
                        </div>
                    </div>
                </form>
                
                <form method="post">

                    <!-- <div class="input-group input-group-sm mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <button id="foodModel_cardButton" type="submit" name="vote"
                        class=" foodModel_cardButton form-control" value="<?=$data['id']?>"
                        style="background-color:<?=$changes['btn_color']?>">Vote</button> -->
                </form>
            </div>
        </div>
        <!-- </a> -->
        <?php
               
        ?>
        <div class="dashboard-wraper" id="comments" style="margin-bottom:40px">
            <div class="" id="aforapple"></div>
        </div> 
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
require_once 'footer.php';
?>
<script>
    function Copy() 
    {
        var $temp = $("<input>");
        var $url = $(location).attr('href');

        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        $("#p2").text("URL copied!");
        
    }

    var user = '<?=$USER_ID?>';
    var username = '<?=$USERNAME?>';
    var c_id = '<?=$contest_id?>';

    function readmore(id) {

        var readMoreRef = $("#anchor"+id);
        var para = $("#readcomment"+id);
        var text=''
        var mode = readMoreRef.attr('data-mode');
        if(mode == 'more')
        {
            text  = readMoreRef.attr('data-fullText');
            readMoreRef.attr('data-mode','less').html(' Read Less');
        }else if(mode == 'less')
        {
            text  = readMoreRef.attr('data-less');
            readMoreRef.attr('data-mode','more').html(' ...Read More');
        }
        // console.log(fulltext);
        para.html(text);

    }

    $(document).ready(function()	
	{
        
        var type = '<?=$token?>';
        var id ;
        
            id = type;
            // $.ajax(
            // {
            //     url:"view_ajax.php",
            //     type:"post",
            //     data:{ fetch:true,
            //         id:id
                        
            //          },
            //     dataType: "html" ,    
            //     success : function(data)
            //     {
            //         var objec = JSON.parse(data);
            //         if(objec.msg.trim()=="ok")
            //         {
            //             $("#aforapple").append(objec.html);
            //         }
            //         if(objec.msg.trim()=="no_data")
            //         {
            //             $("#aforapple").append(`<div class="alert alert-danger" role="alert" id="alert12" data-closable>
            //                                             No Discussions Found!
            //                                             <span class="float-right" style="cursor:pointer;">x</span>
            //                                         </div>`);
            //         }
                    
            //     },
            //     error:
            //     function(err){}
            // })

            $.ajax(
            {
                url:"view_ajax.php",
                type:"post",
                data:{ fetch_comment:true,
                    id:id
                        
                     },
                dataType: "html" ,    
                success : function(data)
                {
                    var comment = JSON.parse(data);
                    if(comment.msg.trim()=="ok")
                    {
                        $("#aforapple").append(comment.com)
                        $("#spaceforcomment").append(comment.html);
                    }
                    if(comment.msg.trim()=="no_data")
                    {
                        $("#aforapple").append(`<div class="alert alert-primary" role="alert" id="alert12" data-closable>
                                                        No Comments Found!
                                                        
                                                    </div>`);
                    }
                    
                },
                error:
                function(err){}
            })
        
    });


    function replycomment(id)
    {
        $(".reinput").show();
        $(".repliessss").hide();
        $("#replyoption"+id).hide();
        $("#replyinput"+id).show();
    }

    function addComment(id)
    {
        var comm = $("#yehhaicomment").val();
        if(comm!='')
        {
            $.ajax(
            {
                url:"view_ajax.php",
                type:"post",
                data:{ comm:comm,
                    id:id,
                    user:user,
                    c_id:c_id,
                        
                     },
                dataType: "html" ,    
                success : function(data)
                {
                    
                    if(data.trim()=="inserted")
                    {
                        $("#commentkijagah").prepend(`<div class="alert alert-success" role="alert" id="1344" data-closable>
                                                        Your Comment has been added succesfully!
                                                        <span class="float-right" style="cursor:pointer;" onclick='remover(1344)'>x</span>
                                                    </div>`);
                        $("#spaceforcomment").append(`<li class='dashboard-wraper' style=' background: linear-gradient(to bottom, <?=$comment_color?> 0%, #ffffff 100%);'>
                                                            <span style='margin-bottom:0px' id='readcomment$com_id'>${comm} </span>
                                                            <p style='align-items:flex-end;display:flex;flex:1;justify-content:flex-end;margin-bottom:0px'>
                                                                Today &nbsp;<i class='bi bi-clock'></i> &emsp;By ${username}
                                                            </p>
                                                        </li>`);
                        if($("#alert12").length)
                        {
                            $("#alert12").remove();
                        }
                        $("#yehhaicomment").val('');
                    }
                    else if(data.trim()=="error")
                    {
                        $("#commentkijagah").append(`<div class="alert alert-danger" role="alert" id="1444" data-closable>
                                                        An error occured while adding your comment!
                                                        <span class="float-right" style="cursor:pointer; onclick='remover(1444)'>x</span>
                                                    </div>`);
                    }
                    
                },
                error:
                function(err){}
            })
        }
        else
        {
            alert('Please write something to Comment!');
        }
       
    }

    function replied(c_id)
    {
        var reply = $("#yehhaireply"+c_id).val();
        if(reply != "")
        {
            $.ajax(
            {
                url:"view_ajax.php",
                type:"post",
                data:{  reply :reply,
                        c_id:c_id,
                        user:user,
                     },
                dataType: "html" ,    
                success : function(data)
                {
                   
                    if(data.trim()=="inserted")
                    {
                        $(".reinput").show();
                        $(".repliessss").hide();
                        $("#prependreply"+c_id).prepend(` <li>
                                                            <p style='margin-bottom:0px'>${reply} </p>
                                                            <p style='align-items:flex-end;display:flex;flex:1;justify-content:flex-end;margin-bottom:0px'>
                                                                &emsp;By ${username}
                                                            </p>
                                                        </li>`)
                        $("#noreplies"+c_id).remove();
                        $("#commentkijagah").prepend(`<div class='alert alert-success' id='8449'>
                                                    Your Reply has been submitted succesfully!
                                                    <span onclick='remover(8449)' class="float-right" style="cursor:pointer;">x</span>
                                                </div>`)

                    }
                    if(data.trim()=="error")
                    {
                        $(".reinput").show();
                        $(".repliessss").hide();
                        $("#commentkijagah").prepend(`<div class='alert alert-success' id='8449'>
                                                    An error occured while adding your comment!
                                                    <span onclick='remover(8449)' class="float-right" style="cursor:pointer;">x</span>
                                                </div>`)

                    }
                    
                    
                },
                error:
                function(err){}
            });
        }
        else
        {
            alert("Please write something to reply!")
        }
        

    }

</script>