<?php
require_once '../lib/core.php';

if(isset($_GET['token'])&&!empty($_GET['token']))
{
    $token=$_GET['token'];
    $sql="select cu.*, v.video, u.name from contest_users cu, videos v, users u where cu.c_id='$token' and v.c_id='$token' and cu.u_id=v.u_id";
    $result =  $conn->query($sql);
    if($result->num_rows)
    {
        while($row = $result->fetch_assoc())
        {
            $users[] = $row;
        }
    }
    
    if(isset($_POST['edit_header']))
    {
        $title=$_POST['title'];
        $title_color=$_POST['title_color'];
        $subtitle=$_POST['sub_title'];
        $subtitle_color=$_POST['sub_title_color'];
        $sql="update index_changes set title='$title',subtitle='$subtitle',title_color='$title_color',subtitle_color='$subtitle_color' where c_id='$token'";
        if($conn->query($sql))
        {
            $insert_id = $token;
            if(upload_images2($_FILES,$conn,"index_changes","c_id","header_image",$insert_id,"projectFile",$website_link."/admin/uploads"))
            {
                $resMember = "all_true";
            }
            else
            {
                $resMember = "files_left";
            } 
        }
        else
        {
            $errorMember=$conn->error;
        }
    }
    if(isset($_POST['edit_body']))
    {
        $body_title=$_POST['body_title'];
        $body_title_color=$_POST['body_title_color'];
        $body_subtitle=$_POST['body_subtitle'];
        $body_subtitle_color=$_POST['body_subtitle_color'];
        $sql="update index_changes set body_title='$body_title',body_title_color='$body_title_color',body_subtitle='$body_subtitle',body_subtitle_color='$body_subtitle_color' where c_id='$token'";
        if($conn->query($sql))
        {
            $resMember = true;
        }
        else
        {
            $errorMember=$conn->error;
        }
    }

    if(isset($_POST['edit_basic_theme']))
    {
        $name_color=$_POST['name_color'];
        $btn_color=$_POST['btn_color'];
        $vote_color=$_POST['vote_color'];
        $sql="update index_changes set name_color='$name_color', btn_color='$btn_color', votes_color='$vote_color' where c_id='$token'";
        if($conn->query($sql))
        {
            $resMember = true;
        }
        else
        {
            $errorMember=$conn->error;
        }
    }

    $sql="select * from index_changes where c_id='$token'";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            $row = $result->fetch_assoc();
                $changes = $row;
        }
    }
    $sql="select * from btn_color";
    if($result =  $conn->query($sql))
    {
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc())
            {
                $btn[] = $row;
            }    
        }
    }
}

?>
<html>
    <head>
        <title>Index</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">   
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/foodModel.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .btn-success{
                background color: green;
                color: white;
            }
        </style>
    </head>
    
    <body>
        <div>
            <img id="foodModel_headingImg" src="<?=$changes['header_image']?>" >
            <div id="foodModel_heading_Div">
                <h5 id="foodModel_heading_h5" style="color: <?=$changes['title_color']?>;"> <?=$changes['title']?> </h5> 
                <p id="foodModel_heading_p" style="color: <?=$changes['subtitle_color']?>;"><?=$changes['subtitle']?></p><button title="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i></button>
                
            </div>
        </div>
        
        <div class="container" style="margin-top:30px">
            
            <h6 id="foodModel_heading2" style="color:<?=$changes['body_title_color']?>"><?=$changes['body_title']?></h6>
            <div class="container" style="margin-bottom:30px;">
                <p id="foodModel_mainPara" style="<?=$changes['body_subtitle_color']?>"><?=$changes['body_subtitle']?></p>
                
                <button title="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default2"><i class="fa fa-edit"></i></button> 
                
            </div>
            <button title="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default3"><i class="fa fa-edit"></i></button>
            <div class="row" id="foodModel_cardMain">
            
            
        <?php
            if(isset($users))
            {
                $i=1;
                foreach($users as $data)
                {
        ?>
                    <div class="col-md-3" id="foodModel_card">
                        <img id="foodModel_img" src="../images/icecream1.jpg" style="width:100%">
                        <div class="container">
                        <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>"><?=$data['name']?></b></h6> 
                        <p id="foodModel_cardPara" style="width:20%;"><?=$data['description']?></p> 
                        <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;"><?=$data['votes']?></h6>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                        </div>
                    </div>
        <?php
                $i++;
                }
            }
            else
            {
        ?>
            <div class="row" id="foodModel_cardMain">
              <div class="col-md-3" id="foodModel_card">
                <img id="foodModel_img" src="../images/icecream1.jpg" style="width:100%">
                <div class="container">
                  <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>">LONDON FOG</b></h6> 
                  <p id="foodModel_cardPara" style="width:20%;">A mix of Ear! Grey tea and creamy vanilla. Has a distinct black tea flavour while still being bright and slighty floral.</p> 
                  <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;">1,977 Votes</h6>
                  <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                </div>
              </div>
              <div class="col-md-3" id="foodModel_card">
                <img id="foodModel_img" src="../images/icecream2.jpg" style="width:100%">
                <div class="container">
                  <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>">LONDON FOG</b></h6> 
                  <p id="foodModel_cardPara" style="width:20%;">A mix of Ear! Grey tea and creamy vanilla. Has a distinct black tea flavour while still being bright and slighty floral.</p> 
                  <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;">1,977 Votes</h6>
                  <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                </div>
              </div>
              <div class="col-md-3" id="foodModel_card">
                <img id="foodModel_img" src="../images/icecream3.jpg" style="width:100%">
                <div class="container">
                  <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>">LONDON FOG</b></h6> 
                  <p id="foodModel_cardPara" style="width:20%;">A mix of Ear! Grey tea and creamy vanilla. Has a distinct black tea flavour while still being bright and slighty floral.</p> 
                  <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;">1,977 Votes</h6>
                  <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                </div>
              </div>
            </div>
            <div class="row" id="foodModel_cardMain">
              <div class="col-md-3" id="foodModel_card">
                <img id="foodModel_img" src="../images/icecream1.jpg" style="width:100%">
                <div class="container">
                  <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>">LONDON FOG</b></h6> 
                  <p id="foodModel_cardPara" style="width:20%;">A mix of Ear! Grey tea and creamy vanilla. Has a distinct black tea flavour while still being bright and slighty floral.</p> 
                  <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;">1,977 Votes</h6>
                  <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                </div>
              </div>
              <div class="col-md-3" id="foodModel_card">
                <img id="foodModel_img" src="../images/icecream2.jpg" style="width:100%">
                <div class="container">
                  <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>">LONDON FOG</b></h6> 
                  <p id="foodModel_cardPara" style="width:20%;">A mix of Ear! Grey tea and creamy vanilla. Has a distinct black tea flavour while still being bright and slighty floral.</p> 
                  <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;">1,977 Votes</h6>
                  <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                </div>
              </div>
              <div class="col-md-3" id="foodModel_card">
                <img id="foodModel_img" src="../images/icecream3.jpg" style="width:100%">
                <div class="container">
                  <h6 id="foodModel_cardHeading"><b class="foodModel_cardHeading" style="color: <?=$changes['name_color']?>">LONDON FOG</b></h6> 
                  <p id="foodModel_cardPara" style="width:20%;">A mix of Ear! Grey tea and creamy vanilla. Has a distinct black tea flavour while still being bright and slighty floral.</p> 
                  <h6 id="foodModel_cardVotes" class="votecolor" style="margin-right: 82%; color:<?=$changes['vote_color']?>;">1,977 Votes</h6>
                  <div class="input-group input-group-sm mb-3">
                    <input type="email" class="form-control" placeholder="Email" style="width:20%;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button id="foodModel_cardButton" type="button" class=" foodModel_cardButton form-control" style="width:10%;background-color:<?=$changes['btn_color']?>">Vote</button>
                </div>
              </div>
            </div>
        <?php

            }
        ?>
            </div>
            
        </div>
        <div class="modal fade" id="modal-default" >
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Header</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                       
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label>Title</label><br>   
                                        <input type="text"  id="title" name="title" class="form-control" value="<?=$changes['title']?>" required>  
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label>Sub Title</label><br>   
                                        <textarea type="text"  id="sub_title" name="sub_title" class="form-control" required><?=$changes['subtitle']?></textarea>
                                    </div> 
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Title Color</label><br>   
                                        <input type="color"  id="title_color" name="title_color" value="<?=$changes['title_color']?>" class="form-control"  required>  
                                    </div> 
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Subtitle Color</label><br>   
                                        <input type="color"  id="sub_title_color" name="sub_title_color" value="<?=$changes['subtitle_color']?>" class="form-control"  required>  
                                    </div> 
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Background Image</label><br>   
                                        <button type="button" class="btn btn-success" onclick="$('#projectfile').click()"><i class="fa fa-edit"></i></button>  
                                    </div> 
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:20px"> 
                                <?php
                                    if(isset($changes['header_image'])) 
                                    {
                                         
                                ?>
                                                <div class="col-md-2" id="file">
                                                    <div class="col-md-8">
                                                        <img src="<?=$changes['header_image']?>" width="100px" height="100px" id="logoImg"/>
                                                    </div>
                                                </div>
                                                    
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-4" id="filesDiv"> 
                                    <input   type="file" id='projectfile' name="projectFile[]" class="form-control" style="visibility:hidden"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Preview</button>
                            <button type="submit" name="edit_header" class="btn btn-primary" value="">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default2">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        
                    <h4 class="modal-title">Edit Body</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label>Title</label><br>   
                                        <input type="text"  id="body_title" name="body_title" class="form-control" value="<?=$changes['body_title']?>" required>  
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label>Description</label><br>   
                                        <textarea  id="body_subtitle" name="body_subtitle" class="form-control" required><?=$changes['body_subtitle']?> </textarea>  
                                    </div> 
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Title Color</label><br>   
                                        <input type="color"  id="body_title_color" name="body_title_color" value="<?=$changes['body_title_color']?>" class="form-control"  required>  
                                    </div> 
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Subtitle Color</label><br>   
                                        <input type="color"  id="body_subtitle_color" name="body_subtitle_color" value="<?=$changes['body_subtitle_color']?>" class="form-control"  required>  
                                    </div> 
                                </div>
                            </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Preview</button>
                            <button type="submit" name="edit_body" class="btn btn-primary" value="">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default3">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Basic Theme</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Vote Button Color</label>
                                        <input type="color" id="btn_color" name="btn_color" value="<?=$changes['btn_color']?>" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Name Color</label><br>   
                                        <input type="color"  id="name_color" name="name_color" class="form-control" value="<?=$changes['name_color']?>"  required>  
                                    </div> 
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Vote Color</label><br>   
                                        <input type="color"  id="vote_color" name="vote_color" value="<?=$changes['vote_color']?>" class="form-control"  required>  
                                    </div> 
                                </div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Preview</button>
                            <button type="submit" name="edit_basic_theme" class="btn btn-primary" value="">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    
</html>

<script>
    $("#title").on("input",function(){
        $("#foodModel_heading_h5").html($(this).val());
    })

    $("#title_color").on("input",function(){
        var titlecolor= $("#title_color").val();
        $("#foodModel_heading_h5").css("color", titlecolor);
    })

    $("#sub_title").on("input",function(){
        $("#foodModel_heading_p").html($(this).val());
    })

    $("#sub_title_color").on("input",function(){
        var subtitlecolor= $("#sub_title_color").val();
        $("#foodModel_heading_p").css("color", subtitlecolor);
    })

    $("#body_title").on("input",function(){
        $("#foodModel_heading2").html($(this).val());
    })

    $("#body_title_color").on("input",function(){
        var btcolor= $("#body_title_color").val();
        $("#foodModel_heading2").css("color", btcolor);
    })

    $("#body_subtitle").on("input",function(){
        $("#foodModel_mainPara").html($(this).val());
    })

    $("#body_subtitle_color").on("input",function(){
        var bstcolor= $("#body_subtitle_color").val();
        $("#foodModel_mainPara").css("color", bstcolor);
    })

    $("#btn_color").on("input",function(){
        var btncolor = $("#btn_color").val();
        $(".foodModel_cardButton").css("background-color", btncolor);
    })

    $("#name_color").on("input",function(){
        var nmcolor= $("#name_color").val();
        $(".foodModel_cardHeading").css("color", nmcolor);
    })
    $("#vote_color").on("input",function(){
        var vtcolor= $("#vote_color").val();
        $(".votecolor").css("color", vtcolor);
    })

    var counter=1;
    
    $(function()
    {
        $("#projectfile").change(function(evt)
        {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById("logoImg").src = fr.result;
                    document.getElementById("foodModel_headingImg").src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            } 
        })
    });
</script>